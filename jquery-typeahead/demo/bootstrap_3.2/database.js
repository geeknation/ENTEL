$('#user_v1-query').typeahead({
    minLength: 1,
    order: "asc",
    dynamic: true,
    delay: 500,
    backdrop: {
        "background-color": "#fff"
    },
    display: "username",
    template: '<span class="row">' +
    '<span class="avatar">' +
    '<img src="{{avatar}}">' +
    "</span>" +
    '<span class="username">{{username}}</span>' +
    '<span class="id">({{id}})</span>' +
    "</span>",

    source: {
        user: {
            data: [{
                "id": 415849,
                "username": "an inserted user that is not inside the database",
                "avatar": "https://avatars3.githubusercontent.com/u/415849"
            }],

            url: [{
                type: "POST",
                url: "/jquerytypeahead/user_v1.json",
                data: {
                    apiKey: "35e8959af42d73e1e172c2a2992f34f1",
                    q: "{{query}}"
                },

                process: function (data) {
                    for (var i = 0; i < data.data.user.length; i++) {
                        if (data.data.user[i].username === 'running-coder') {
                            data.data.user[i].username += ' <small style="color: #ff1493">(owner)</small>'
                            break;
                        }
                    }
                    return data;
                }

            }, "data.user"]
        },
        project: {

            url: [{
                type: "POST",
                url: "/jquerytypeahead/user_v1.json",
                data: {
                    q: "{{query}}"
                }
            }, "data.project"],
            display: "project",
            template: '<span>' +
            '<span class="project-logo">' +
            '<img src="{{image}}">' +
            '</span>' +
            '<span class="project-information">' +
            '<span class="project">{{project}} <small>{{version}}</small></span>' +
            '<ul>' +
            '<li>{{demo}} Demos</li>' +
            '<li>{{option}}+ Options</li>' +
            '<li>{{callback}}+ Callbacks</li>' +
            '</ul>' +
            '</span>' +
            '</span>',

            process: function (data) {
            }

        }
    },
    callback: {
        onClick: function (node, a, obj, e) {

            alert(JSON.stringify(obj));

        }
    },
    debug: true
});
