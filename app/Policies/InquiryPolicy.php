<?php

namespace App\Policies;

use App\User;
use App\Inquiry;
use App\AcceptInquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class InquiryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the inquiry.
     *
     * @param  \App\User  $user
     * @param  \App\Inquiry  $inquiry
     * @return mixed
     */
    public function view(User $user, Inquiry $inquiry)
    {
        return True;
    }

    /**
     * Determine whether the user can create inquiries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    public function hasAcceptedInquiry(User $user, Inquiry $inquiry)
    {
        $hasAcceptedInquiry = AcceptInquiry::where('user_id', $user -> id)
                          ->where('inquiry_id', $inquiry -> id)
                          ->get();

        
        if(count($hasAcceptedInquiry) > 0){
            return True;
        }
    }

    /**
     * Determine whether the user can update the inquiry.
     *
     * @param  \App\User  $user
     * @param  \App\Inquiry  $inquiry
     * @return mixed
     */
    public function update(User $user, Inquiry $inquiry)
    {
        return $user->id == $inquiry->creator_id;
    }

    /**
     * Determine whether the user can delete the inquiry.
     *
     * @param  \App\User  $user
     * @param  \App\Inquiry  $inquiry
     * @return mixed
     */
    public function delete(User $user, Inquiry $inquiry)
    {
        //
        return $user->id == $inquiry->creator_id;
    }
}
