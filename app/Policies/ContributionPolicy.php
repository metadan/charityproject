<?php

namespace App\Policies;

use App\User;
use App\Contribution;
use App\AcceptContribution;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class ContributionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the contribution.
     *
     * @param  \App\User  $user
     * @param  \App\Contribution  $contribution
     * @return mixed
     */
    public function view(User $user, Contribution $contribution)
    {
        return True;
    }

    /**
     * Determine whether the user can create contributions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    public function hasAcceptedContribution(User $user, Contribution $contribution)
    {
        $hasAcceptedContribution = AcceptContribution::where('user_id', $user -> id)
                          ->where('contribution_id', $contribution -> id)
                          ->get();
        
        if(count($hasAcceptedContribution) > 0){
            return True;
        }
    }

    /**
     * Determine whether the user can update the contribution.
     *
     * @param  \App\User  $user
     * @param  \App\Contribution  $contribution
     * @return mixed
     */
    public function update(User $user, Contribution $contribution)
    {
        return $user->id == $contribution->creator_id;
    }

    /**
     * Determine whether the user can delete the contribution.
     *
     * @param  \App\User  $user
     * @param  \App\Contribution  $contribution
     * @return mixed
     */
    public function delete(User $user, Contribution $contribution)
    {
        return $user->id == $contribution->creator_id;
    }
}
