<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index(Request $request)
    {
        $query = User::query();
        $search = $request->get('search');
        $direction = $request->get('direction');
        $sort = $request->get('sort');
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        if ($sort) {
            $query->orderBy($sort, $direction);
        }
        $users = $query->paginate(10);
        return JsonResponse::create($users);
    }
}
