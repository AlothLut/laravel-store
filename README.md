laravel-store-test

1. make build
2. make composer-install
3. make key-generate



problems:

1. Got permission denied while trying to connect to the Docker daemon socket after (make restore_db)

solution: 'sudo usermod -aG docker $USER' => reboot