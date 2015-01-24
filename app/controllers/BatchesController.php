<?php

class BatchesController extends \BaseController {

	/**
	 * Display a listing of batches
	 *
	 * @return Response
	 */
	public function index()
	{
		$batches = Batch::all();

		return View::make('batches.index', compact('batches'));
	}

	/**
	 * Show the form for creating a new batch
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('batches.create');
	}

	/**
	 * Store a newly created batch in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Batch::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Batch::create($data);

		return Redirect::route('batches.index');
	}

	/**
	 * Display the specified batch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$batch = Batch::findOrFail($id);

		return View::make('batches.show', compact('batch'));
	}

	/**
	 * Show the form for editing the specified batch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$batch = Batch::find($id);

		return View::make('batches.edit', compact('batch'));
	}

	/**
	 * Update the specified batch in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$batch = Batch::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Batch::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$batch->update($data);

		return Redirect::route('batches.index');
	}

	/**
	 * Remove the specified batch from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Batch::destroy($id);

		return Redirect::route('batches.index');
	}

}
