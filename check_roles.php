<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Checking users_role table...\n";

try {
    // Check if users_role table exists
    $tables = DB::select("SHOW TABLES LIKE 'users_role'");
    
    if (empty($tables)) {
        echo "users_role table NOT found! Creating...\n";
        
        // Create users_role table
        DB::statement("
            CREATE TABLE users_role (
                id INT PRIMARY KEY,
                roles_name VARCHAR(255) NOT NULL
            )
        ");
        
        // Insert default roles
        DB::table('users_role')->insert([
            ['id' => 1, 'roles_name' => 'superadmin'],
            ['id' => 2, 'roles_name' => 'admin'],
            ['id' => 3, 'roles_name' => 'user']
        ]);
        
        echo "users_role table created and populated!\n";
    } else {
        echo "users_role table exists.\n";
        $roles = DB::table('users_role')->get();
        echo "Roles found:\n";
        foreach($roles as $role) {
            echo "- ID: {$role->id}, Name: {$role->roles_name}\n";
        }
    }
    
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
