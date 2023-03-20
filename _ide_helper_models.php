<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Applications
 *
 * @property int $id
 * @property string $pet_name
 * @property string $photo_url
 * @property string $status
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ApplicationsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Applications newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applications newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applications query()
 * @method static \Illuminate\Database\Eloquent\Builder|Applications whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications wherePetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applications whereUserId($value)
 */
	class Applications extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Applications> $applications
 * @property-read int|null $applications_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

