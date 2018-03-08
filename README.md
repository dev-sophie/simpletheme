# simpletheme
Wordpress Theme

For sass compiling to css add the folder to sublime project and save project in theme folder. Add new build system with the following content:

{
    "cmd": ["sass", "--update", "$file:${project_path}/assets/css/${file_base_name}.css", "--stop-on-error", "--no-cache",  "--style", "expanded"],
    "selector": "source.sass, source.scss",
    "line_regex": "Line ([0-9]+):",

    "osx":
    {
        "path": "/usr/local/bin:$PATH"
    },

    "windows":
    {
        "shell": "true"
    }
}

Save it and select it as build system.

Everytime you changed something in your scss file hit Ctrl + B to compile.
