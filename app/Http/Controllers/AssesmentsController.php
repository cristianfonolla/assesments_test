<?php

namespace App\Http\Controllers;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AssesmentsCreateRequest;
use App\Http\Requests\AssesmentsUpdateRequest;
use App\Repositories\AssesmentsRepository;
use App\Validators\AssesmentsValidator;

class AssesmentsController extends Controller
{

    /**
     * @var AssesmentsRepository
     */
    protected $repository;

    /**
     * @var AssesmentsValidator
     */
    protected $validator;

    public function __construct(AssesmentsRepository $repository, AssesmentsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $assesments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $assesments,
            ]);
        }

        return view('assesments.index', compact('assesments'));
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assesments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AssesmentsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AssesmentsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $assesment = $this->repository->create($request->all());

            $response = [
                'message' => 'Assesments created.',
                'data'    => $assesment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assesment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $assesment,
            ]);
        }

        return view('assesments.show', compact('assesment'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $assesment = $this->repository->find($id);

        return view('assesments.edit', compact('assesment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AssesmentsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AssesmentsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $assesment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Assesments updated.',
                'data'    => $assesment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Assesments deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Assesments deleted.');
    }
}
