<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepairPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, Car $car)
    {
        return $user->id === $car->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Car $car)
    {
        return $user->id === $car->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Car $car, Repair $repair)
    {
        return $user->id === $car->user_id 
            && $car->id === $repair->car_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Car $car, Repair $repair)
    {
        return $user->id === $car->user_id 
            && $car->id === $repair->car_id;
    }
}
