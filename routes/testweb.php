<?php
    use Illuminate\support\Facades\Route;
    use Illuminate\Support\Facades\URL;
    use \Illuminate\Support\Facades\Request;

    Route::get('about', function () {
        return view('about');
    });

    Route::get('products', function () {
        return view('products');
    });

    Route::get('services', function () {
        return view('services');
    });

    /*--Static call--*/
//$router->get('/', function () {
//    return 'Hello, World!';
//});

    Route::post('/', function () {
        // menhandle seseorang yang mengirim request POST pada rute
    });

    Route::put('/', function () {
        //  menhandle seseorang yang mengirim request PUT pada rute
    });

    Route::delete('/', function () {
        // menhandle seseorang yang mengirim request DELETE pada rute
    });

    Route::any('/', function () {
        //  menhandle any verb request terhadap rute
    });

    Route::match(['get', 'post'], '/', function () {
        // menghandle GET or POST request
    });

    $name = 'Asrofil Nadib';
    Route::get('example/{$id}', function ($id) use ($name) {
        return "Selamat datang " . $name . " dengan id " . $id;
    });

    Route::get('/', 'WelcomeController@index');

    Route::get('users/{$id}/friends', function ($id) {
        //
    });

    Route::get('users/{$id}', function ($id='18ngi2u8') {
        //
    });

    Route::get('users/{$id}', function ($id) {
        //
    })->where('id', '[0-9]+');

    Route::get('users/{username}', function ($username) {
        //
    })->where('username', 'Asrofil Nadib');

    Route::get('posts/{$id}/slug', function ($id, $slug) {
        //
    })->where(['id'=>'[0-9]+', 'slug'=>'[A-Za-z]+']);

    /*<a href="<?php echo url('/'); ?>">*/
// Outputs <a href="http://myapp.com/">

    Route::get('members/{$id}', 'MembersController@show')->name('members.show');
    /*<a href="<?php echo route('members.show', ['id'=>14]); ?>">*/
    Route::get('members/{$id}', [
        'as'=>'members.show',
        'uses'=>'MembersConotroller@show',
    ]);

    Route::group('/helloworld', function () {
        Route::get('hello', function () {
            return 'Hello';
        });
        Route::get('world', function () {
            return 'World';
        });
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        });
        Route::get('accounts', function () {
            return view('accounts');
        });
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        });
        Route::get('accounts', function () {
            return view('accounts');
        });
    });

    class DashboardController extends \Illuminate\Routing\Controller {
        public function __contruct() {
            $this->middleware('auth');
            $this->middleware('admin-auth')
                ->only('editUsers');
            $this->middleware('team-members')
                ->except('editUsers');
        }
    }

    Route::middleware('auth:api', 'throttle:60,1')->group(function () {
        Route::get('/profile', function () {
            //
        });
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            // handle path /dashboard
        });
        Route::get('users', function () {
            // handle path /dasboard/users
        });
    });

    Route::any('{anything}', 'CatchAllController')->where('anything', '*');

    Route::fallback(function () {
        //
    });

    Route::domain('api.myapps.com')->group(function () {
        Route::get('/', function () {
            //
        });
    });

    Route::domain('{account}.myapps.com')->group(function () {
        Route::get('/', function ($account) {
//        return "Welcome to the {$account} section of the site!";
        });
        Route::get('users/{id}', function ($account, $id) {
            //
        });
    });

// app/Http/Controller/UserController
Route::get('/', 'UserController@index');

Route::namespace('dashboard')->group(function () {
    // app/Http/Controller/PurchaseController
    Route::get('dashboard/purchases', 'PurchaseController@index');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::name('comment.')->prefix('comment')->group(function () {
        Route::get('{id}', function () {

        })->name('show');
    });
});

Route::get('invitation/{invitation}/{answers}', 'InvitationController')
    ->name('invitation')
    ->middleware('signed');

// Generate normal link
URL::route('invitation', ['invitation' => 12345, 'answers' => 'yes']);
// Generate signed link
URL::signedRoute('invitation', ['invitation' => 12345, 'answers' => 'yes']);
// Generate an Expired (sementara) signed link
URL::temporarySignedRoute(
    'invitation',
    now()->addHour(4),
    ['invitation' => 12345, 'answers' => 'yes']
);

class InvitationControl {
    public function __invoke(Invitation $invitation, $answer, $request)
    {
        // TODO: Implement __invoke() method.
        if (! $request->hasValidSignature()) {
            abort(403);
        }
        //
    }
}

/* Example 3-18 */
Route::get('/', function () {
    return view('home');
});

Route::get('task', function () {
    return view('task.index')
        ->with('task', Task::all());
});

Route::view('/', 'welcome');
Route::view('/', 'walcome', ['users'=>'Nadib']);

view()->share('key', 'value');

Route::get('conference/{id}', function ($id) {
    $conference = Conference::findOrFail($id);
});

Route::get('conferences/{conference}', function (Conference $conference) {
    return view('conferences.show')->with('conference', $conference);
});

Route::get('events/{event}', function (Conference $event) {
    return view('events.show')->with('event', $event);
});
?>

<!-- Form method spofing-->
<form action="tasks/5/" method="post">
    <input  type="hidden" name="_method" value="DELETE">
    <!--- OR: --->
    @method('DELETE')
</form>

<!-- CSRF TOKEN -->
<form action="/tasks/5" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_token" value="<?php echo csrf_field(); ?>">
    @csrf
</form>

<!-- in javascripts we use <meta> -->
<meta name="csrf_token" content="<?php echo csrf_field(); ?>" id="token">

<input name="username" value="<?=
    old('username', 'Default username instructions here');
?>">

<?php
/*    // In jQuery:
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // With Axios:
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] =
        document.head.querySelector('meta[name="csrf-token"]'); */

// Using the global helper to generate a redirect response
    Route::get('redirect-with-helper', function () {
        return redirect()->to('login');
    });
// Using the global helper shortcut
    Route::get('redirect-with-helper-shortcut', function () {
        return redirect('login');
    });
// Using the facade to generate a redirect response
    Route::get('redirect-with-facade', function () {
        return Redirect::to('login');
    });
// Using the Route::redirect shortcut in Laravel 5.5+
    Route::redirect('redirect-by-route', 'login');

Route::get('redirect', function () {
    redirect()->to('home');
    // atau sama dengan
    redirect('home');
});

Route::get('redirect', function () {
    return redirect()->route('conference.show', ['conference' => 99]);
});

Route::get('redirect_with_key_value', function () {
    redirect('dashboard')
        ->with('error', true);
});
Route::get('redirect_with_array', function () {
    redirect('dashboard')
        ->with(['error' => true, 'message' => 'whoops!']);
});

Route::get('form', function () {
    return view('form');
});
Route::get('form', function () {
    return redirect('form')
        ->withInput()
        ->with(['error' => true, 'message' => 'whoops!']);
});
