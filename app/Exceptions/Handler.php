<?php
//
//namespace App\Exceptions;
//
//use App\Exceptions\CustomException\LogicException;
//use Exception;
//use Illuminate\Auth\AuthenticationException;
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Throwable;
//
//class Handler extends Exception
//{
//    use ExceptionTrait;
//
//    /**
//     * A list of the exception types that are not reported.
//     *
//     * @var array
//     */
//    protected $dontReport = [
//        LogicException::class,
//    ];
//
//    /**
//     * A list of the inputs that are never flashed for validation exceptions.
//     *
//     * @var array
//     */
//    protected $dontFlash = [
//        'password',
//        'password_confirmation',
//    ];
//
//
//    public function report(Throwable $exception)
//    {
////        if (!App::environment('local') && $this->shouldReport($exception) && app()->bound('sentry')) {
////            \Sentry\configureScope(function (Scope $scope) {
////                if ($user = request()->user()) {
////                    $scope->setUser(
////                        [
////                            'id' => $user->id,
////                            'email' => $user->email,
////                            'name' => $user->first_name,
////                        ]
////                    );
////                } else {
////                    $scope->setUser(
////                        [
////                            'ip-address' => request()->ip(),
////                        ]
////                    );
////                }
////                $scope->setContext('git', [
////                    'id' => trim(exec('git --git-dir ' . base_path('.git') . ' log --pretty="%h" -n1 HEAD')),
////                ]);
////            });
////
////            app('sentry')->captureException($exception);
////        }
//        return false;
//    }
//
//
//    public function render($request, Throwable $exception)
//    {
//
//        if ($request->expectsJson()) {
//            return $this->getJsonResponseForException($request, $exception);
//        }
//
//        if ($exception instanceof LogicException) {
//            return $this->logicException($exception);
//        }
//
//        return false;
//    }
//
//    protected function unauthenticated($request, AuthenticationException $exception)
//    {
//        if ($request->expectsJson()) {
//            return $this->jsonResponse(__('exceptions.login_required'), null, 401);
//        }
//
//        return redirect('/login');
//    }
//}
