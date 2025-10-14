<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ListUsersService;
use App\Infra\FileUserRepository;

$repository = new FileUserRepository(__DIR__ . '/../storage/users.txt');
$listUsersService = new ListUsersService($repository);

$users = $listUsersService->getAllUsers();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuários</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-4">
  <h1 class="text-xl font-bold mb-4">Usuários</h1>

  <?php if (empty($users)): ?>
    <p class="text-gray-500">Nenhum usuário cadastrado.</p>
  <?php else: ?>
    <table class="w-half border">
      <thead>
        <tr>
          <th class="border px-2 py-1 text-left">Nome</th>
          <th class="border px-2 py-1 text-left">E-mail</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td class="border px-2 py-1"><?= htmlspecialchars($user['name']) ?></td>
            <td class="border px-2 py-1"><?= htmlspecialchars($user['email']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
