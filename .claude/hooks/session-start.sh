#!/bin/bash
set -euo pipefail

# Only run in remote (Claude Code on the web) environments
if [ "${CLAUDE_CODE_REMOTE:-}" != "true" ]; then
  exit 0
fi

cd "$CLAUDE_PROJECT_DIR"

# Install PHP dependencies
composer install --no-interaction --prefer-dist

# Set up .env if it doesn't exist
if [ ! -f .env ]; then
  cp .env.example .env
  php artisan key:generate --ansi
fi

# Ensure SQLite database file exists (used by default DB_CONNECTION)
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi

# Install Node.js dependencies
npm install
