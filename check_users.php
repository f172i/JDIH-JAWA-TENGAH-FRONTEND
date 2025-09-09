<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Checking users...\n";

try {
    $users = DB::table('users')->get();
    echo "Found " . count($users) . " users\n";
    
    foreach($users as $user) {
        echo "- Email: " . $user->email . " (role: " . $user->role . ", status: " . ($user->status ?? 'N/A') . ")\n";
    }
    
    // Check specific admin user
    $admin = DB::table('users')->where('email', 'admin@super.com')->first();
    if ($admin) {
        echo "\nAdmin user found:\n";
        echo "- ID: " . $admin->id . "\n";
        echo "- Name: " . $admin->name . "\n";
        echo "- Email: " . $admin->email . "\n";
        echo "- Role: " . $admin->role . "\n";
        echo "- Status: " . ($admin->status ?? 'N/A') . "\n";
        echo "- Password hash: " . substr($admin->password, 0, 20) . "...\n";
        
        // Check if password matches
        $passwordCheck = Hash::check('adminjateng123!@#', $admin->password);
        echo "- Password check: " . ($passwordCheck ? "MATCH" : "NO MATCH") . "\n";
    } else {
        echo "\nAdmin user NOT found!\n";
    }
    
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
