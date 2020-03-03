<?php

use Ahorak\Todo\Models\Todo;
use Illuminate\Http\Request; 

Route::get('api/populate', function() {
    $faker = Faker\Factory::create();
    
    for($i = 0; $i < 20; $i++) {
        Todo::create([
            'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $faker->text($maxNbChars = 200),
            'status' => $faker->boolean($chanceOfGettingTrue = 50),
            'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
    }

    return "Todo list populated!";
});

Route::get('api/todos', function(){
    $todos = Todo::all();

    return $todos;
});

// Route::group([
// 	'prefix'     => 'api/v1',
// 	'namespace'  => 'Ahorak\Todo\Controllers',
// 	'middleware' => 'cors'
// ], function() {

    Route::post('api/add-todo', function(Request $req){
        $data = $req->input(); //Everything that is coming from the vue end, will be stored in this variable

        // Create new to do item on our backend and save to database
        Todo::create([
            // Define each of the todo fields, pulling from the data sent 
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
    });
// });

Route::post('api/delete-todo', function(Request $req){
    $data = $req->input(); //Everything that is coming from the vue end, will be stored in this variable

    // Delete data record according to the id
    Todo::destroy([$data['id']]);
});

Route::post('api/toggle-todo', function(Request $req){
    $data = $req->input(); //Everything that is coming from the vue end, will be stored in this variable

    // find todo where id (DB) is equal to $data id
    // and update its status according to the status of data we are sending
    Todo::where('id', $data['id'])->update(['status' => $data['status']]); 
});

Route::post('api/update-todo', function(Request $req){
    $data = $req->input(); //Everything that is coming from the vue end, will be stored in this variable

    // find todo where id (DB) is equal to $data id
    // and update its values according to the values of data we are sending
    Todo::where('id', $data['id'])
    ->update([
        'status' => $data['status'],
        'title' => $data['title'],
        'description' => $data['description'],
        ]); 
});