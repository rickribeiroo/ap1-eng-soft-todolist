    <?php

class Task {
    private static $file = __DIR__ . '/../../storage/tasks.json';

    public static function all() {
        if (!file_exists(self::$file)) {
            file_put_contents(self::$file, json_encode([]));
        }
        $data = file_get_contents(self::$file);
        return json_decode($data, true) ?? [];
    }

    public static function toggleDone($id) {
        // Pega todas as tarefas
        $tasks = self::all();

        // Percorre cada tarefa
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                // Alterna o booleano que controla a linha riscada
                $task['done'] = !$task['done'];

                // Atualiza o status textual
                $task['status'] = $task['done'] ? 'feito' : 'pendente';
                break; // para o loop, já achou a tarefa
            }
        }

        // Salva de volta no arquivo JSON
        file_put_contents(self::$file, json_encode($tasks, JSON_PRETTY_PRINT));
    }
}