<?php
// namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

   // Fetch data from JSON Faker API
    public function fetchFromJsonFakerApi()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        return $response->json();
    }
    
    // Get all data
    public function index()
    {       
        $todo = Todo::all();
        return response()->json($todo);
    }

    // Store data
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json([
            'message' => 'Todo item created successfully',
            'data' => $todo,
        ], 201);
    }
    
    // Get data by ID
    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo item not found'], 404);
        }

        return response()->json([
            'message' => 'Todo item',
            'data' => $todo,
        ], 200);
    }

    // Update data by ID
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    // Delete data based on ID
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo item not found'], 404);
        } else {
            // Todo item found, proceed with the deletion
            $todo->delete();
            return response()->json(['message' => 'Todo item deleted'], 200);
        }
    }
}
