<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\password;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\suggest;
use function Laravel\Prompts\text;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('greetold {name?}', function (string $name = null) {
    if (! $name) {
        $name = $this->ask('What is your name?');
    }

    $this->info("Hello, {$name}");
});

Artisan::command('greet', function () {
    // $name = text(
    //     label: 'What is your name?',
    //     placeholder: 'E.g. Taylor Otwell',
    //     default: 'Andre',
    //     required: 'Your name is required!!!!!',
    //     validate: fn (string $value) => match (true) {
    //         strlen($value) < 3 => 'The name must be at least 3 characters.',
    //         strlen($value) > 255 => 'The name must not exceed 255 characters.',
    //         default => null
    //     }
    // );

    // $password = password(
    //     label: 'What is your password?',
    //     placeholder: 'Enter your password',
    //     required: 'Your password is required!!!!!',
    //     validate: fn (string $value) => match (true) {
    //         strlen($value) < 3 => 'The password must be at least 3 characters.',
    //         strlen($value) > 255 => 'The password must not exceed 255 characters.',
    //         default => null
    //     }
    // );

    // $this->info("Hello, {$name}");
    // $this->info("Password: {$password}");

    // $confirmed = confirm(
    //     label: 'Do you accept the terms?',
    //     default: false,
    //     yes: 'I accept',
    //     no: 'I decline',
    //     required: 'You must accept the terms to continue.'
    // );

    // dd($confirmed);

    // $role = select(
    //     label: 'What role should the user have?',
    //     options: [
    //         'member' => 'Member',
    //         'contributor' => 'Contributor',
    //         'owner' => 'Owner',
    //         'hi' => 'there',
    //         'more' => 'options',
    //         'one' => 'more',
    //     ],
    //     validate: fn (string $value) => $value === 'owner'
    //         ? 'An owner already exists.'
    //         : null,
    //     default: 'owner',
    //     scroll: 3
    // );

    // dd($role);

    // $permissions = multiselect(
    //     label: 'What permissions should be assigned?',
    //     options: [
    //         'read' => 'Read',
    //         'create' => 'Create',
    //         'update' => 'Update',
    //         'delete' => 'Delete',
    //     ],
    //     default: ['read', 'create']
    // );

    // dd($permissions);

    // $name = suggest(
    //     label: 'What is your name?',
    //     options: ['Taylor', 'Dayle'],
    //     placeholder: 'E.g. Taylor',

    // );

    // dd($name);

    $id = search(
        'Search for the user that should receive the mail',
        fn (string $value) => strlen($value) > 0
            ? User::where('name', 'like', "%{$value}%")->pluck('name', 'id')->all()
            : []
    );

    dd($id);
});
