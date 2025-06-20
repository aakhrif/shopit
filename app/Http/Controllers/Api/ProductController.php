<?php
    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return Product::all();
        }


        /**
         * Store a newly created resource in storage.
         * return response()->json(['test' => 'OK']);
         */
        public function store(Request $request)
        {
            // 1. Validierung MIT Error-Handling
            try {
                $data = $request->validate([
                    'name' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0',
                    'image' => 'required|string|max:255',
                    'sizes' => 'nullable|array',
                    'sizes.*' => 'string|in:S,M,L,XL,XXL', // ← Jeder Array-Eintrag muss string sein
                    'description' => 'nullable|string'
                ]);
            } catch (\Exception $e) { // Fängt ALLE Exceptions ab
                \Log::error("Validierungsfehler: " . $e->getMessage());

                // Spezieller Check für ValidationException
                if ($e instanceof \Illuminate\Validation\ValidationException) {
                    return response()->json([
                        'error' => 'Validierungsfehler',
                        'details' => $e->errors()
                    ], 422);
                }

                return response()->json(['error' => 'Serverfehler'], 500);
            }

            // 2. DB-Operation
            try {
                $product = Product::create($data);
                return response()->json($product, 201);
            } catch (\Exception $e) {
                \Log::error("DB-Fehler: " . $e->getMessage());
                return response()->json(['error' => 'Datenbankfehler'], 500);
            }
        }

        /**
         * Display the specified resource.
         */
        public function show(Product $product)
        {
            return $product;
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
