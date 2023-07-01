pipeline {
    agent {
        label 'hegemone'
    }

    environment {
        WEB_DIR = '/var/www/contact_page'
    }

    stages {
        stage('Preparation') {
            steps {
                // Delete workspace before build starts
                deleteDir()
            }
        }

        stage('Checkout') {
            steps {
                // Checkout code from Git repository
                checkout([
                    $class: 'GitSCM',
                    branches: [[name: '*/master']],
                    doGenerateSubmoduleConfigurations: false,
                    extensions: [],
                    submoduleCfg: [],
                    userRemoteConfigs: [[
                        url: 'https://github.com/Rea888/contact_page.git'
                    ]]
                ])
            }
        }

        stage('Build') {
            steps {

                // Create production .env file for symfony
                script {
                    sh 'mv .env.dist .env'
                }

                // Replace App environment
                script {
                    sh "sed -i 's|^APP_ENV=dev|APP_ENV=prod|' .env"
                }

                // Update database connection details (Variables must created in Jenkins)
                script {
                    def databaseUrl = "mysql://${CP_DB_USER}:${CP_DB_PASSWD}@${CP_DB_HOST}/${CP_DB_DATABASE}?serverVersion=8.0.32\\&charset=utf8mb4"
                    sh "sed -i 's|^DATABASE_URL=\"mysql:.*|DATABASE_URL=\"${databaseUrl}\"|' .env"
                }

                // Update APP SECRET
                script {
                    sh "sed -i 's|^APP_SECRET=.*|APP_SECRET=${CP_APP_SECRET}|' .env"
                }

                // Run composer install
                script {
                    sh 'composer install'
                }

                // Remove unnecessary files
                script{
                    sh 'rm -rf .git .gitattributes .gitignore README.md phpunit.xml .editorconfig composer.json composer.lock tests'
                }
            }
        }

        stage('Deploy') {
            steps {
                // Copy the artifact folder to webroot with a git commit hash suffix for versioning, then create a symlink to the latest deployment.
                script{
                    sh 'cp -r ./ $WEB_DIR-$GIT_COMMIT'
                    sh 'ln -sfn $WEB_DIR-$GIT_COMMIT $WEB_DIR'
                }
            }
        }

        stage('Clean Old Build Directories') {
            steps {
                sh '''
                    echo "Remove old build directories (keeping last 2)"
                    $WEB_DIR-* | tail -n +3 | xargs -d '\\n' rm -rf --
                '''
            }
        }
    }
}
