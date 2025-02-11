<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectRespons;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
    ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "1000"],
    ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "998"],
    ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "50"],
    ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "100"],
    ["id" => "5", "name" => "Watch", "description" => "Best Watch", "price" => "200"],

    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) //TODO: Ask about the return type
    {
        if (!isset(ProductController::$products[$id - 1])) {
            return response()->redirectToRoute("home.index");
        }
        $viewData = [];
        $product = ProductController::$products[$id - 1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] = $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Successful Creation";

        $request->validate([
        "name" => "required",
        "price" => ["required", "gt:0", "numeric"]
        ]);
        // dd($request->all());
        //here will be the code to call the model and save it to the database
        return view('product.success')->with("viewData", $viewData);
    }
}
