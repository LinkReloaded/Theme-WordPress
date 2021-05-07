<?php	/*
	Template Name: Redirecci&oacute;n al home
	*/
	$bloginfo = get_bloginfo('url');
	$urlbase = "Location: ";
	$urlbase .= $bloginfo;
	$urlbase .= "/";
	header($urlbase);
	exit;		

	// Datos para cargar el campo ACF 
	// Copie desde la línea 14 hasta la línea 69, pegue en un archivo limpio y guardelo con .json, luego vaya al panel de wordpress en "Campos personalizados / Herramientas" e importelo. 
	/*
			[
			    {
			        "key": "group_5ce5d4d63b55d",
			        "title": "Redirección al Home",
			        "fields": [
			            {
			                "key": "field_5ce5d4165e701",
			                "label": "",
			                "name": "",
			                "type": "message",
			                "instructions": "",
			                "required": 0,
			                "conditional_logic": 0,
			                "wrapper": {
			                    "width": "",
			                    "class": "",
			                    "id": ""
			                },
			                "message": "<strong>Página inactiva:<\/strong>\r\nLos visitantes de esta página serán redirigidos al <strong>HOME<\/strong>, si quiere utilizarla, cambie la plantilla por la \"plantilla predeterminada\" en la sección Atributos de página de la columna derecha.",
			                "new_lines": "wpautop",
			                "esc_html": 0
			            }
			        ],
			        "location": [
			            [
			                {
			                    "param": "post_template",
			                    "operator": "==",
			                    "value": "page-redireccion.php"
			                }
			            ]
			        ],
			        "menu_order": 0,
			        "position": "acf_after_title",
			        "style": "seamless",
			        "label_placement": "top",
			        "instruction_placement": "label",
			        "hide_on_screen": [
			            "permalink",
			            "the_content",
			            "excerpt",
			            "discussion",
			            "comments",
			            "revisions",
			            "slug",
			            "author",
			            "format",
			            "featured_image",
			            "categories",
			            "tags",
			            "send-trackbacks"
			        ],
			        "active": true,
			        "description": ""
			    }
			]
	*/
?>