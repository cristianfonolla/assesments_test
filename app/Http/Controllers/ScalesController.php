<?php

namespace App\Http\Controllers;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ScaleCreateRequest;
use App\Http\Requests\ScaleUpdateRequest;
use App\Repositories\ScaleRepository;
use App\Validators\ScaleValidator;

class ScalesController extends Controller
{

    /**
     * @var ScaleRepository
     */
    protected $repository;

    /**
     * @var ScaleValidator
     */
    protected $validator;

    public function __construct(ScaleRepository $repository, ScaleValidator $validator)
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
        $scales = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $scales,
            ]);
        }

        return view('scales.index', compact('scales'));
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ScaleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ScaleCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $scale = $this->repository->create($request->all());

            $response = [
                'message' => 'Scale created.',
                'data'    => $scale->toArray(),
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
        $scale = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $scale,
            ]);
        }

        return view('scales.show', compact('scale'));
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

        $scale = $this->repository->find($id);

        return view('scales.edit', compact('scale'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ScaleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ScaleUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $scale = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Scale updated.',
                'data'    => $scale->toArray(),
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
                'message' => 'Scale deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Scale deleted.');
    }
}
