<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;

class CadastroController extends Controller
{
    public function execute()
    {
        return view('admin.cadastro');
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/'
            ],
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma minúscula e um número.',
        ]);


        if ($validator->fails()) {
            $errorMessage = implode(" ", $validator->errors()->all());

            return redirect('/admin/cadastro')
                ->with('messages', [
                    [
                        "type" => "error",
                        "text" => $errorMessage
                    ]
                ])
                ->withInput();
        }

        try {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect('/admin/cadastro')
                ->with('messages', [
                    [
                        "type" => "success",
                        "text" => 'Usuário cadastrado com sucesso.'
                    ]
                ]);
        } catch (\Exception $e) {
            return redirect('/admin/cadastro')
                ->with('messages', [
                    [
                        "type" => "error",
                        "text" => 'Erro ao cadastrar usuário: ' . $e->getMessage()
                    ]
                ]);
        }
    }
}
