<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use App\Models\Ticket;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    // Konsep service repository pattern
    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        // dd($data);
        return view('front.index', $data);
    }

    //model-binding
    //balon-terbang

    public function details(Ticket $ticket)
    {
        // dd($ticket);
        return view('front.details', compact('ticket'));
    }

    public function category(Category $category)
    {
        // dd($category);
        return view('front.category', compact('category'));
    }

    public function explore(Seller $seller)
    {
        return view('front.seller', compact('seller'));
    }

    //konsep mvcp
    //  public function index()
    //  {
    //       $catagories = Category::latest()->get();
    //       $popular_tickets = Ticket::where('is_popular', true)->take(4)->get();
    //       $new_tickets = Ticket::latest()->get();
    //       return view('front.index', compact('categories','popular_tickets','new_tickets'));
    //   }
}
