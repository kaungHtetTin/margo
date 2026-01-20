<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::ordered()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'order' => 'nullable|integer|min:0',
            ]);

            // Handle is_active checkbox - default to true for new FAQs
            $validated['is_active'] = $request->has('is_active') ? true : true;
            $validated['order'] = $validated['order'] ?? 0;

            Faq::create($validated);

            return redirect()->route('admin.faqs.index')
                ->with('success', 'FAQ created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating the FAQ: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $faq = Faq::findOrFail($id);

            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'order' => 'nullable|integer|min:0',
            ]);

            // Handle is_active checkbox - true if checked, false if not
            $validated['is_active'] = $request->has('is_active') ? true : false;
            $validated['order'] = $validated['order'] ?? 0;

            $faq->update($validated);

            return redirect()->route('admin.faqs.index')
                ->with('success', 'FAQ updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the FAQ: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $faq = Faq::findOrFail($id);
            $faq->delete();

            return redirect()->route('admin.faqs.index')
                ->with('success', 'FAQ deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.faqs.index')
                ->with('error', 'An error occurred while deleting the FAQ: ' . $e->getMessage());
        }
    }
}
