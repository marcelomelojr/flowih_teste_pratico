<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;

class CarController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $cars = Car::paginate(8);

        return view('home',
            [
                'cars' => $cars,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $request->validated();
        try {
            $car = Car::create([
                ...$request->validated(),
                'user_id' => auth()->user()->id,
            ]);
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $car->images()->create([
                        'url' => $image->store('images', 'public'),
                    ]);
                }
            }
            notify()->success('Carro cadastrado com sucesso!', 'Sucesso');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            notify()->error('Erro ao cadastrar carro!', 'Erro');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show', [
            'car' => $car,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', [
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        try {
            $car->fill($request->validated());
            $car->save();

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $car->images()->create([
                        'url' => $image->store('images', 'public'),
                    ]);
                }
            }

            notify()->success('Carro editado com sucesso!', 'Sucesso');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            notify()->error('Erro ao atualizar carro!', 'Erro');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
            $car->delete();
            notify()->success('Carro excluído com sucesso!', 'Sucesso');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            notify()->error('Erro ao excluir carro!', 'Erro');
            return redirect()->back();
        }
    }
}
