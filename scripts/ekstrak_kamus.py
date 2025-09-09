import sys
import os
import json
import re
import unicodedata

# Check PyMuPDF import
try:
    import fitz  # PyMuPDF
except ImportError:
    print("[ERROR] PyMuPDF tidak terinstall. Install dengan: pip install PyMuPDF")
    sys.exit(1)

if len(sys.argv) < 3:
    print("Penggunaan: python ekstrak_kamus.py [input_pdf] [output_json]")
    sys.exit(1)

pdf_path = sys.argv[1]
output_json = sys.argv[2]

# Validasi file input
if not os.path.exists(pdf_path):
    print(f"[ERROR] File tidak ditemukan: {pdf_path}")
    sys.exit(1)

if not pdf_path.lower().endswith('.pdf'):
    print(f"[ERROR] File bukan PDF: {pdf_path}")
    sys.exit(1)

print(f"[INFO] Memproses file: {pdf_path}")

try:
    # Buka PDF
    doc = fitz.open(pdf_path)
    print(f"[OK] PDF berhasil dibuka, {len(doc)} halaman")
except Exception as e:
    print(f"[ERROR] Gagal membuka PDF: {str(e)}")
    sys.exit(1)

# Ekstrak teks dari semua halaman
full_text = ""
try:
    for page_num, page in enumerate(doc):
        page_text = page.get_text()
        full_text += page_text
        print(f"[INFO] Halaman {page_num + 1}: {len(page_text)} karakter")
    
    doc.close()
    print(f"[OK] Total teks: {len(full_text)} karakter")
    
except Exception as e:
    print(f"[ERROR] Gagal membaca halaman PDF: {str(e)}")
    sys.exit(1)

if not full_text.strip():
    print("[ERROR] PDF tidak mengandung teks yang dapat dibaca")
    sys.exit(1)

# Batasi hanya pada Pasal 1 (Ketentuan Umum)
original_length = len(full_text)

# Cari bagian Pasal 1 atau Ketentuan Umum
pasal1_patterns = [
    r'(Pasal\s+1.*?)(?=Pasal\s+2|BAB\s+II|PASAL\s+2)',
    r'(KETENTUAN\s+UMUM.*?)(?=Pasal\s+2|BAB\s+II|PASAL\s+2)',
    r'(BAB\s+I.*?)(?=BAB\s+II|PASAL\s+2)',
]

pasal1_text = ""
for pattern in pasal1_patterns:
    match = re.search(pattern, full_text, flags=re.DOTALL | re.IGNORECASE)
    if match:
        pasal1_text = match.group(1)
        print(f"[INFO] Ditemukan Pasal 1: {len(pasal1_text)} karakter")
        break

# Jika tidak ditemukan pola khusus, ambil 3000 karakter pertama saja
if not pasal1_text:
    pasal1_text = full_text[:3000]
    print(f"[INFO] Menggunakan 3000 karakter pertama sebagai fallback")

full_text = pasal1_text
print(f"[INFO] Teks setelah filter Pasal 1: {len(full_text)} karakter (dari {original_length})")

# Ekstraksi definisi dengan pola khusus untuk Pasal 1
patterns = [
    r'\d+\.\s*([^\n\r]+?)\s+adalah\s+(.*?)(?=\n\s*\d+\.|\Z)',  # 1. istilah adalah ...
    r'([A-Z][A-Za-z\s]+?)\s+adalah\s+(.*?)(?=\n\d+\.|\n[A-Z][A-Za-z\s]+?\s+adalah|\Z)',  # ISTILAH adalah ...
    r'"([^"]+)"\s+adalah\s+(.*?)(?=\n\d+\.|\n"[^"]+"\s+adalah|\Z)',  # "istilah" adalah ...
]

kamus = {}
total_found = 0

for i, pola in enumerate(patterns):
    matches = re.findall(pola, full_text, re.DOTALL | re.IGNORECASE)
    pattern_count = len(matches)
    total_found += pattern_count
    print(f"[INFO] Pola {i+1}: menemukan {pattern_count} definisi")
    
    for istilah, definisi in matches:
        # Bersihkan istilah
        istilah_clean = re.sub(r'[^\w\s]', '', istilah).strip()
        if len(istilah_clean) < 2:
            continue
            
        # Bersihkan definisi
        definisi_clean = re.sub(r'\s+', ' ', definisi.strip())
        if len(definisi_clean) < 5:
            continue
            
        # Normalisasi kunci
        kunci = unicodedata.normalize("NFKC", istilah_clean).lower()
        isi = unicodedata.normalize("NFKC", definisi_clean)
        
        # Hindari duplikasi
        if kunci not in kamus:
            kamus[kunci] = {
                "istilah": istilah_clean,
                "definisi": isi
            }

print(f"[OK] Total unik ditemukan: {len(kamus)} istilah")

if len(kamus) == 0:
    print("[WARNING] Tidak ada definisi yang ditemukan. Mungkin format PDF berbeda.")
    # Simpan sebagian teks untuk debugging
    debug_output = output_json.replace('.json', '_debug.txt')
    try:
        with open(debug_output, 'w', encoding='utf-8') as f:
            f.write(full_text[:2000])  # 2000 karakter pertama
        print(f"[INFO] Simpan debug text ke: {debug_output}")
    except:
        pass

# Simpan hasil
try:
    with open(output_json, "w", encoding="utf-8") as f:
        json.dump(kamus, f, ensure_ascii=False, indent=2)
    print(f"[OK] Berhasil ekstrak {len(kamus)} istilah ke {output_json}")
except Exception as e:
    print(f"[ERROR] Gagal menyimpan JSON: {str(e)}")
    sys.exit(1)

print("[SUCCESS] Ekstraksi selesai!")
