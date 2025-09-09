<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Updating admin password...\n";

try {
    $newPassword = 'adminjateng123!@#';
    $hashedPassword = Hash::make($newPassword);
    
    $updated = DB::table('users')
        ->where('email', 'admin@super.com')
        ->update(['password' => $hashedPassword]);
    
    if ($updated) {
        echo "Password updated successfully!\n";
        
        // Verify the update
        $admin = DB::table('users')->where('email', 'admin@super.com')->first();
        $passwordCheck = Hash::check($newPassword, $admin->password);
        echo "Password verification: " . ($passwordCheck ? "SUCCESS" : "FAILED") . "\n";
    } else {
        echo "Failed to update password!\n";
    }
    
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
