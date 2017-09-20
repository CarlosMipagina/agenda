define({ "api": [
  {
    "type": "get",
    "url": "/usuario/:id",
    "title": "lista un usuario",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "id",
            "description": "<p>Numero  de documento  del usuario.</p>"
          }
        ]
      }
    },
    "name": "ListarUsuario",
    "group": "usuario",
    "examples": [
      {
        "title": "Ejemplo:",
        "content": "curl  -i  http://agendar.dev/api/v1/usuario/id",
        "type": "curl"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>The <code>404</code> El usuario no fue incontrado</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n[\n     {\n        \"id\":1,\n        \"nombre\":\"Carlos Arturo\",\n        \"apellidos\":\"Gonzalez Alvarez\"\n     }\n]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "usuario"
  },
  {
    "type": "get",
    "url": "/usuario",
    "title": "lista todos los usuarios",
    "name": "ListarUsuarios",
    "group": "usuario",
    "examples": [
      {
        "title": "Ejemplo:",
        "content": "curl  -i  http://agendar.dev/api/v1/usuario",
        "type": "curl"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>The <code>404</code> El usuario no fue incontrado</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n[\n     {\n        \"id\":1,\n        \"nombre\":\"Carlos Arturo\",\n        \"apellidos\":\"Gonzalez Alvarez\"\n     }\n]",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "routes/web.php",
    "groupTitle": "usuario"
  }
] });
