# To learn more about how to use Nix to configure your environment
# see: https://developers.google.com/idx/guides/customize-idx-env
{ pkgs }:

{
  # Which nixpkgs channel to use.
  channel = "stable-24.05"; # or "unstable"

  # Use https://search.nixos.org/packages to find packages
  packages = [
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.nodejs_20
  ];

  # Sets environment variables in the workspace
  env = {};

  services.mysql = {
    enable = true;
  };

  idx = {
    # Search for the extensions you want on https://open-vsx.org/ and use "publisher.id"
    extensions = [
      # Theme
      "PKief.material-icon-theme"
      "esbenp.prettier-vscode"
      "usernamehw.errorlens"

      # SQL
      "mtxr.sqltools"
      "mtxr.sqltools-driver-mysql"

      # HTML
      "ecmel.vscode-html-css"
      "formulahendry.auto-rename-tag"
      "kisstkondoros.vscode-gutter-preview"

      # PHP
      "bmewburn.vscode-intelephense-client"
      "MehediDracula.php-namespace-resolver"

      # Laravel
      "onecentlin.laravel5-snippets"
      "onecentlin.laravel-blade"
      "shufo.vscode-blade-formatter"
      "codingyu.laravel-goto-view"
    ];

    workspace = {
      # Runs when a workspace is first created with this `dev.nix` file
      onCreate = {
        # Example: install JS dependencies from NPM
        npm-install = "npm install";
        composer-install = ''
          composer install && \
          cp .env.example .env && \
          php artisan key:generate && \
          php artisan migrate && \
          php artisan db:seed --class=RoleSeeder && \
          php artisan db:seed --class=UserSeeder && \
          php artisan db:seed --class=CategorySeeder && \
          php artisan storage:link
        '';

        # Open editors for the following files by default, if they exist:
        default.openFiles = ["README.md"];
      };

      # To run something each time the workspace is (re)started, use the `onStart` hook
    };

    # Enable previews and customize configuration
    previews = {
      enable = true;

      previews = {
        web = {
          command = ["php" "artisan" "serve" "--port" "$PORT" "--host" "0.0.0.0"];
          manager = "web";
        };
      };
    };
  };
}
