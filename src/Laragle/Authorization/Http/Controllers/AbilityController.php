<?php

namespace Laragle\Authorization\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Laragle\Authorization\Http\Resources\AbilityResource;
use Laragle\Authorization\Models\Ability;

class AbilityController extends Controller
{
    use AuthorizesRequests;

    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Ability::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AbilityResource::collection(
            Ability::search($request->q)
                ->sort($request->sorters)
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        return AbilityResource::make(Ability::create($validated));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Silber\Bouncer\Database\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        return AbilityResource::make($ability);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Silber\Bouncer\Database\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ability $ability)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('abilities')->ignore($ability)
            ]
        ]);

        $ability->update($validated);

        return ['success' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Silber\Bouncer\Database\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
        $ability->delete();

        return ['success' => true];
    }
}