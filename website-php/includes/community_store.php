<?php
/**
 * Campus Fede Nowback Pro - Store & Data Management Layer
 * Fede Nowback Community Platform
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

// Auto-initialize DB Schema if needed
fede_db_init_schema();

// Admin Credentials Configuration
define('FEDE_ADMIN_EMAIL', 'mfmujic@gmail.com');
define('FEDE_ADMIN_PASSWORD_HASH', '$2y$10$JTe0nSMklYpYmJ9WWfu9D..9pa2As0cr7A8dwicItTjzo9yM5tMKC'); // 'marcelito'

// Initialize Session User if not present
if (!isset($_SESSION['fede_user'])) {
    $_SESSION['fede_user'] = [
        'id' => 'user_' . substr(md5(session_id()), 0, 8),
        'email' => 'alumno@fedenowback.com',
        'name' => 'Alumno Pro',
        'handle' => '@creador_pro',
        'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
        'role' => 'member', // 'admin' or 'member'
        'is_logged_in' => true,
        'points' => 45,
        'level' => 3,
        'level_name' => 'Creador Constante',
        'completed_lessons' => ['lesson_1_1', 'lesson_1_2', 'lesson_2_1'],
        'joined_date' => 'Septiembre 2026'
    ];
}

// CSRF Token Generation & Validation
if (!isset($_SESSION['fede_csrf_token'])) {
    $_SESSION['fede_csrf_token'] = bin2hex(random_bytes(24));
}

function fede_csrf_token() {
    return $_SESSION['fede_csrf_token'];
}

function fede_verify_csrf($token) {
    return isset($_SESSION['fede_csrf_token']) && hash_equals($_SESSION['fede_csrf_token'], $token ?? '');
}

/**
 * Get Level Info from Points
 */
function fede_get_level_info($points) {
    if ($points >= 150) {
        return ['level' => 5, 'name' => 'Nowback Master', 'badge' => '🔥 Rango 5', 'next_points' => 300, 'min_points' => 150];
    } elseif ($points >= 66) {
        return ['level' => 4, 'name' => 'Creador Imparable', 'badge' => '⚡ Rango 4', 'next_points' => 150, 'min_points' => 66];
    } elseif ($points >= 21) {
        return ['level' => 3, 'name' => 'Creador Constante', 'badge' => '🚀 Rango 3', 'next_points' => 66, 'min_points' => 21];
    } elseif ($points >= 6) {
        return ['level' => 2, 'name' => 'Accionador', 'badge' => '🎯 Rango 2', 'next_points' => 21, 'min_points' => 6];
    } else {
        return ['level' => 1, 'name' => 'Iniciado', 'badge' => '🌱 Rango 1', 'next_points' => 6, 'min_points' => 0];
    }
}

/**
 * Get Default Seed Community Data
 */
function fede_get_default_community_data() {
    return [
        'group' => [
            'name' => 'Campus Nowback Pro',
            'subtitle' => 'Comunidad Oficial & Academia de Fede Nowback',
            'host' => 'Fede Nowback',
            'members_count' => 342,
            'online_count' => 28,
            'description' => 'Espacio de alto rendimiento para creadores, profesionales y emprendedores que quieren monetizar su conocimiento, vencer la procrastinación y construir una marca personal imparable.',
            'cover_image' => '/assets/img/fede_nowback_hero.jpg',
            'avatar' => '/assets/img/fede_nowback_fuego.jpg'
        ],
        'categories' => [
            ['id' => 'todos', 'name' => 'Todos los temas', 'icon' => '🔥'],
            ['id' => 'comunicados', 'name' => 'Comunicados de Fede', 'icon' => '📢', 'admin_only' => true],
            ['id' => 'general', 'name' => 'Debate General', 'icon' => '💬'],
            ['id' => 'victorias', 'name' => 'Victorias & Facturación', 'icon' => '🏆'],
            ['id' => 'feedback', 'name' => 'Feedback de Contenido', 'icon' => '🎯'],
            ['id' => 'preguntas', 'name' => 'Preguntas al Mentor', 'icon' => '💡'],
            ['id' => 'recursos', 'name' => 'Plantillas & Recursos', 'icon' => '📂']
        ],
        'posts' => [
            [
                'id' => 'post_1',
                'category' => 'comunicados',
                'pinned' => true,
                'author' => [
                    'id' => 'fede_admin',
                    'name' => 'Fede Nowback',
                    'handle' => '@fedenowback',
                    'avatar' => '/assets/img/fede_nowback_fuego.jpg',
                    'is_host' => true,
                    'level_name' => '👑 MENTOR & HOST',
                    'badge' => '👑 HOST'
                ],
                'title' => '🔥 BIENVENIDA AL CAMPUS: Cómo aprovechar esta comunidad para despegar tu marca',
                'content' => "¡Creadores y emprendedores, bienvenidos a nuestro Campus!\n\nEste no es un grupo pasivo más. Acá venimos a ejecutar, a corregir en público y a facturar con nuestra marca personal.\n\nReglas clave para sacarle el 100% de jugo:\n1. Cada like que recibís en tus posts o respuestas te suma FUEGO (puntos) para desbloquear nuevas masterclasses en la Academia.\n2. Los Viernes 19:00 hs tenemos nuestro Meet en Vivo donde abro micrófonos para hacer Hot Seats y auditar cuentas en directo.\n3. Si lograste una venta o publicaste un reel que traccionó, compartilo en #Victorias para inspirar al resto.\n\nDejá un comentario abajo presentándote: quién sos, qué vendés y cuál es tu meta este mes.",
                'likes' => 84,
                'liked_by' => ['user_demo', 'user_1', 'user_2'],
                'created_at' => 'Hace 2 horas',
                'comments' => [
                    [
                        'id' => 'comm_1_1',
                        'author' => [
                            'name' => 'Martín Benítez',
                            'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80',
                            'level_name' => 'Nivel 3 • Creador Constante'
                        ],
                        'content' => '¡Tremendo Fede! Soy diseñador UX y este mes mi meta es lanzar mi servicio de consultoría 1 a 1.',
                        'likes' => 12,
                        'created_at' => 'Hace 1 hora'
                    ],
                    [
                        'id' => 'comm_1_2',
                        'author' => [
                            'name' => 'Lucía Santoro',
                            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80',
                            'level_name' => 'Nivel 4 • Creadora Imparable'
                        ],
                        'content' => '¡Con todo! El último Hot Seat me ayudó a cerrar 2 clientes nuevos de coaching por DM. Nos vemos el viernes!',
                        'likes' => 18,
                        'created_at' => 'Hace 45 min'
                    ]
                ]
            ],
            [
                'id' => 'post_2',
                'category' => 'victorias',
                'pinned' => false,
                'author' => [
                    'id' => 'user_3',
                    'name' => 'Gonzalo Rivas',
                    'handle' => '@gonza_growth',
                    'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80',
                    'is_host' => false,
                    'level_name' => 'Nivel 3 • Creador Constante',
                    'badge' => '🚀 Rango 3'
                ],
                'title' => '🚀 Primera venta High-Ticket usando la estructura de Carrusel de Fede ($850 USD)',
                'content' => "Quiero dejar asentado esto porque hace 2 meses tenía pánico de hablar de precios en redes.\n\nApliqué paso a paso el Módulo 3 de la Academia (Guion de quiebre de objeciones + llamado a la acción por DM con palabra clave 'PLAN').\n\nResultado: 14 personas me escribieron, tuve 3 llamadas y acabo de cerrar a mi primer cliente corporativo.\n\n¡La metodología funciona si no te guardás nada y ejecutás todos los días!",
                'likes' => 52,
                'liked_by' => ['user_demo'],
                'created_at' => 'Hace 5 horas',
                'comments' => [
                    [
                        'id' => 'comm_2_1',
                        'author' => [
                            'name' => 'Fede Nowback',
                            'avatar' => '/assets/img/fede_nowback_fuego.jpg',
                            'level_name' => '👑 MENTOR & HOST'
                        ],
                        'content' => '¡Eso es pasar a la ACCIÓN con todo Gonzalo! Felicitaciones enormes. Te espero este viernes en el Meet para que cuentes los detalles del cierre.',
                        'likes' => 24,
                        'created_at' => 'Hace 4 horas'
                    ]
                ]
            ],
            [
                'id' => 'post_3',
                'category' => 'feedback',
                'pinned' => false,
                'author' => [
                    'id' => 'user_4',
                    'name' => 'Camila Valenzuela',
                    'handle' => '@camivalenzuela',
                    'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80',
                    'is_host' => false,
                    'level_name' => 'Nivel 2 • Accionadora',
                    'badge' => '🎯 Rango 2'
                ],
                'title' => '🎯 ¿Qué gancho les parece más potente para este Reel de productividad?',
                'content' => "Chicos, grabé este contenido para profesionales que no tienen tiempo de crear contenido y estoy dudando entre dos ganchos:\n\nOpción A: 'Si trabajás 9 horas al día, este método te ahorra 15 horas de edición semanales.'\nOpción B: 'El error que cometen el 90% de los consultores al querer grabarse en cámara.'\n\n¿Cuál les daría más ganas de frenar el scroll?",
                'likes' => 29,
                'liked_by' => [],
                'created_at' => 'Hace 8 horas',
                'comments' => [
                    [
                        'id' => 'comm_3_1',
                        'author' => [
                            'name' => 'Esteban Morales',
                            'avatar' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=100&auto=format&fit=crop&q=80',
                            'level_name' => 'Nivel 2 • Accionador'
                        ],
                        'content' => 'Voto 100% por la Opción A! Es súper específica con el dolor del tiempo y la promesa es tangible.',
                        'likes' => 8,
                        'created_at' => 'Hace 7 horas'
                    ]
                ]
            ]
        ],
        'courses' => [
            [
                'id' => 'course_1',
                'title' => 'Método Nowback: Marca Personal Imparable',
                'slug' => 'metodo-nowback',
                'level_required' => 1,
                'level_name' => 'Iniciado (Nivel 1)',
                'thumbnail' => '/assets/img/fede_nowback_hero.jpg?v=2',
                'description' => 'El sistema paso a paso para posicionar tu autoridad, definir tu nicho de alto valor y generar prospectos constantes en Instagram y TikTok.',
                'total_lessons' => 8,
                'duration' => '4h 30m',
                'modules' => [
                    [
                        'module_id' => 'mod_1',
                        'title' => 'Módulo 1: Fundamentos de Autoridad & Nicho Imparable',
                        'lessons' => [
                            [
                                'id' => 'lesson_1_1',
                                'title' => '1.1 La Regla de Oro: Por qué la viralidad sin oferta es una trampa',
                                'duration' => '18:45',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => [
                                    'Definir tu propuesta única de valor en 1 sola frase.',
                                    'Completar el mapa de dolores del cliente ideal en la guía de trabajo.'
                                ],
                                'resources' => [
                                    ['name' => 'Guía de Posicionamiento de Nicho (PDF)', 'url' => '#descargar']
                                ]
                            ],
                            [
                                'id' => 'lesson_1_2',
                                'title' => '1.2 Anatomía del Perfil de Instagram Magnético',
                                'duration' => '24:10',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => [
                                    'Optimizar foto de perfil con fondo contrastante.',
                                    'Configurar biografía con gancho + prueba social + llamado a la acción claro.'
                                ],
                                'resources' => [
                                    ['name' => 'Checklist de Optimización de Biografías (PDF)', 'url' => '#descargar']
                                ]
                            ],
                            [
                                'id' => 'lesson_1_3',
                                'title' => '1.3 Cómo estructurar tu oferta irresistible de Alto Valor',
                                'duration' => '32:00',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => [
                                    'Definir entregables claros y transformación garantizada.',
                                    'Fijar precio base sin regalar tu tiempo.'
                                ],
                                'resources' => [
                                    ['name' => 'Calculadora de Precios High-Ticket', 'url' => '#descargar']
                                ]
                            ]
                        ]
                    ],
                    [
                        'module_id' => 'mod_2',
                        'title' => 'Módulo 2: Fábrica de Contenidos de Alta Conversión',
                        'lessons' => [
                            [
                                'id' => 'lesson_2_1',
                                'title' => '2.1 Los 5 Ganchos Psicológicos que detienen el scroll',
                                'duration' => '22:15',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => [
                                    'Escribir 5 variantes de ganchos para tu próximo reel.',
                                    'Testear en el canal #feedback de la comunidad.'
                                ],
                                'resources' => [
                                    ['name' => 'Banco de 50 Ganchos Validados (Notion)', 'url' => '#descargar']
                                ]
                            ],
                            [
                                'id' => 'lesson_2_2',
                                'title' => '2.2 Guion de Reels en 3 partes: Gancho, Aporte y Quiebre',
                                'duration' => '28:50',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => [
                                    'Grabar un reel de 45 segundos siguiendo la plantilla exacta.'
                                ],
                                'resources' => [
                                    ['name' => 'Plantilla de Guion de Reel de 3 Pasos', 'url' => '#descargar']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 'course_2',
                'title' => 'Mentalidad de Fuego: 7 Reglas para Dejar de Postergar',
                'slug' => 'mentalidad-de-fuego',
                'level_required' => 2,
                'level_name' => 'Accionador (Nivel 2)',
                'thumbnail' => '/assets/img/fede_nowback_fuego.jpg',
                'description' => 'Reprogramá tu disciplina diaria, destruí el miedo a la cámara y convertite en una máquina de ejecución implacable.',
                'total_lessons' => 6,
                'duration' => '3h 15m',
                'modules' => [
                    [
                        'module_id' => 'mod_fuego_1',
                        'title' => 'Módulo 1: La Psicología de la Acción Inmediata',
                        'lessons' => [
                            [
                                'id' => 'lesson_fuego_1',
                                'title' => '1.1 Destruyendo la trampa del perfeccionismo paralizante',
                                'duration' => '20:10',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => ['Regla de los 5 segundos para arrancar a grabar.'],
                                'resources' => [['name' => 'Manual de Acción Inmediata', 'url' => '#descargar']]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 'course_3',
                'title' => 'Venta por DMs & WhatsApp: De Seguidor a Cliente',
                'slug' => 'ventas-dms-whatsapp',
                'level_required' => 3,
                'level_name' => 'Creador Constante (Nivel 3)',
                'thumbnail' => '/assets/img/evento_encende_tu_fuego.jpg',
                'description' => 'Guiones exactos para iniciar conversaciones naturales por mensajes privados y cerrar llamadas de venta sin ser invasivo.',
                'total_lessons' => 5,
                'duration' => '2h 45m',
                'modules' => [
                    [
                        'module_id' => 'mod_sales_1',
                        'title' => 'Módulo 1: Flujo de Conversación de Alta Conversión',
                        'lessons' => [
                            [
                                'id' => 'lesson_sales_1',
                                'title' => '1.1 Cómo responder a las historias para generar conversaciones de venta',
                                'duration' => '25:00',
                                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'action_items' => ['Enviar 10 mensajes de prospección utilizando el script.'],
                                'resources' => [['name' => 'Scripts de Venta por DM (PDF)', 'url' => '#descargar']]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 'course_4',
                'title' => 'Masterclasses Grabadas & Sesiones VIP con Fede',
                'slug' => 'masterclasses-vip',
                'level_required' => 4,
                'level_name' => 'Creador Imparable (Nivel 4)',
                'thumbnail' => '/assets/img/fede_nowback_mentor.jpg?v=2',
                'description' => 'Archivo exclusivo de todas las mentorías grupales, análisis de casos de éxito y sesiones de Hot Seat en vivo.',
                'total_lessons' => 12,
                'duration' => '18h 00m',
                'modules' => []
            ]
        ],
        'meets' => [
            [
                'id' => 'meet_1',
                'title' => '🔥 Mentoría Grupal & Hot Seat en Vivo con Fede',
                'description' => 'Sesión en directo donde Fede abre micrófono para auditar perfiles de Instagram, destrabar ofertas y responder preguntas de negocio en tiempo real.',
                'date' => 'Viernes 18 de Septiembre, 2026',
                'time' => '19:00 hs (Buenos Aires / UTC-3)',
                'timestamp' => 1789768800,
                'host' => 'Fede Nowback',
                'platform' => 'Zoom Pro',
                'zoom_url' => 'https://zoom.us/j/fedenowback-hotseat',
                'google_cal_url' => 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=Mentoria+Grupal+Fede+Nowback&dates=20260918T220000Z/20260918T233000Z&details=Hot+Seat+en+Vivo+en+el+Campus+Fede+Nowback&location=Zoom',
                'attendees' => 48
            ],
            [
                'id' => 'meet_2',
                'title' => '🎯 Taller Práctico: Desarmando tu Guion de Reels de Ventas',
                'description' => 'Escribimos juntos en vivo el guion de tu próximo reel con estructura persuasiva y revisión inmediata.',
                'date' => 'Miércoles 23 de Septiembre, 2026',
                'time' => '20:00 hs (Buenos Aires / UTC-3)',
                'timestamp' => 1790197200,
                'host' => 'Fede Nowback',
                'platform' => 'Google Meet',
                'zoom_url' => 'https://meet.google.com/nowback-taller-reels',
                'google_cal_url' => 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=Taller+Reels+Fede+Nowback&dates=20260923T230000Z/20260924T003000Z&details=Taller+Practico+de+Reels&location=Google+Meet',
                'attendees' => 35
            ]
        ],
        'chat_messages' => [
            [
                'id' => 'chat_1',
                'author' => 'Fede Nowback',
                'avatar' => '/assets/img/fede_nowback_fuego.jpg',
                'is_host' => true,
                'content' => '¡Hola a todos los que se sumaron hoy! Recuerden que el viernes tenemos Hot Seat.',
                'time' => '18:30'
            ],
            [
                'id' => 'chat_2',
                'author' => 'Martín Benítez',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80',
                'is_host' => false,
                'content' => 'Genial Fede! Ya tengo mi guion listo para que lo revisemos.',
                'time' => '18:42'
            ],
            [
                'id' => 'chat_3',
                'author' => 'Lucía Santoro',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80',
                'is_host' => false,
                'content' => 'Pregunta rápida: ¿Alguien probó la nueva plantilla de Notion del Módulo 2? Está increíble.',
                'time' => '19:05'
            ]
        ],
        'leaderboard' => [
            ['rank' => 1, 'name' => 'Lucía Santoro', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80', 'points' => 195, 'level' => 5, 'level_name' => 'Nowback Master', 'badge' => '🔥 Rango 5', 'perk' => 'Desbloqueó Hot Seat VIP 1 a 1'],
            ['rank' => 2, 'name' => 'Gonzalo Rivas', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80', 'points' => 142, 'level' => 4, 'level_name' => 'Creador Imparable', 'badge' => '⚡ Rango 4', 'perk' => 'Desbloqueó Masterclass DMs'],
            ['rank' => 3, 'name' => 'Martín Benítez', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80', 'points' => 88, 'level' => 4, 'level_name' => 'Creador Imparable', 'badge' => '⚡ Rango 4', 'perk' => 'Desbloqueó Masterclass DMs'],
            ['rank' => 4, 'name' => 'Camila Valenzuela', 'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80', 'points' => 54, 'level' => 3, 'level_name' => 'Creadora Constante', 'badge' => '🚀 Rango 3', 'perk' => 'Desbloqueó Plantillas Reels'],
            ['rank' => 5, 'name' => 'Alumno Pro (Tú)', 'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80', 'points' => 45, 'level' => 3, 'level_name' => 'Creador Constante', 'badge' => '🚀 Rango 3', 'perk' => 'Desbloqueó Plantillas Reels', 'is_current_user' => true],
            ['rank' => 6, 'name' => 'Esteban Morales', 'avatar' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=100&auto=format&fit=crop&q=80', 'points' => 38, 'level' => 3, 'level_name' => 'Creador Constante', 'badge' => '🚀 Rango 3', 'perk' => 'Desbloqueó Plantillas Reels'],
            ['rank' => 7, 'name' => 'Sofía Navarro', 'avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80', 'points' => 19, 'level' => 2, 'level_name' => 'Accionadora', 'badge' => '🎯 Rango 2', 'perk' => 'Desbloqueó Mentalidad de Fuego'],
            ['rank' => 8, 'name' => 'Joaquín Castro', 'avatar' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=100&auto=format&fit=crop&q=80', 'points' => 14, 'level' => 2, 'level_name' => 'Accionador', 'badge' => '🎯 Rango 2', 'perk' => 'Desbloqueó Mentalidad de Fuego'],
            ['rank' => 9, 'name' => 'Valeria Ruiz', 'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80', 'points' => 8, 'level' => 2, 'level_name' => 'Accionadora', 'badge' => '🎯 Rango 2', 'perk' => 'Desbloqueó Mentalidad de Fuego'],
            ['rank' => 10, 'name' => 'Nicolás Herrera', 'avatar' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&auto=format&fit=crop&q=80', 'points' => 4, 'level' => 1, 'level_name' => 'Iniciado', 'badge' => '🌱 Rango 1', 'perk' => 'Acceso a Comunidad & Meet']
        ],
        'members' => [
            [
                'id' => 'mem_1',
                'name' => 'Fede Nowback',
                'handle' => '@fedenowback',
                'avatar' => '/assets/img/fede_nowback_fuego.jpg',
                'is_host' => true,
                'role_badge' => '👑 MENTOR & HOST',
                'bio' => 'Estratega de Marca Personal & Negocios Digitales. Te enseño a monetizar tu conocimiento y vencer el miedo.',
                'points' => 9999,
                'level_name' => 'Host Supremo',
                'status' => 'En línea',
                'social' => ['instagram' => 'fedenowback']
            ],
            [
                'id' => 'mem_2',
                'name' => 'Lucía Santoro',
                'handle' => '@luciasantoro_coach',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80',
                'is_host' => false,
                'role_badge' => '🔥 Rango 5 • Master',
                'bio' => 'Coach de liderazgo ejecutivo y mentora de comunicación asertiva.',
                'points' => 195,
                'level_name' => 'Nowback Master',
                'status' => 'Activa hace 10m',
                'social' => ['instagram' => 'luciasantoro_coach']
            ],
            [
                'id' => 'mem_3',
                'name' => 'Gonzalo Rivas',
                'handle' => '@gonza_growth',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80',
                'is_host' => false,
                'role_badge' => '⚡ Rango 4 • Imparable',
                'bio' => 'Consultor B2B de Growth Marketing y Adquisición Orgánica.',
                'points' => 142,
                'level_name' => 'Creador Imparable',
                'status' => 'En línea',
                'social' => ['instagram' => 'gonza_growth']
            ],
            [
                'id' => 'mem_4',
                'name' => 'Martín Benítez',
                'handle' => '@martin_ux',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80',
                'is_host' => false,
                'role_badge' => '⚡ Rango 4 • Imparable',
                'bio' => 'Diseñador de producto digital y creador de contenido de diseño.',
                'points' => 88,
                'level_name' => 'Creador Imparable',
                'status' => 'Activo hace 1h',
                'social' => ['instagram' => 'martin_ux']
            ]
        ]
    ];
}

/**
 * Load Community Data from MySQL (with session / default fallback)
 */
function fede_load_community_data() {
    $pdo = fede_db();
    $data = fede_get_default_community_data();

    if ($pdo) {
        try {
            // 1. Fetch Categories from MySQL
            $cats = $pdo->query("SELECT * FROM `fede_categories` ORDER BY `order_num` ASC")->fetchAll();
            if (!empty($cats)) {
                $data['categories'] = $cats;
            }

            // 2. Fetch Posts from MySQL with Author Info & Comments
            $sql_posts = "
                SELECT p.*, u.name as author_name, u.handle as author_handle, u.avatar as author_avatar, u.role as author_role, u.level as author_level, u.level_name as author_level_name
                FROM `fede_posts` p
                JOIN `fede_users` u ON p.user_id = u.id
                ORDER BY p.pinned DESC, p.created_at DESC
                LIMIT 50
            ";
            $db_posts = $pdo->query($sql_posts)->fetchAll();
            if (!empty($db_posts)) {
                $parsed_posts = [];
                foreach ($db_posts as $dp) {
                    // Fetch likes
                    $likes_stmt = $pdo->prepare("SELECT user_id FROM `fede_post_likes` WHERE post_id = ?");
                    $likes_stmt->execute([$dp['id']]);
                    $liked_users = $likes_stmt->fetchAll(PDO::FETCH_COLUMN);

                    // Fetch comments
                    $comm_stmt = $pdo->prepare("
                        SELECT c.*, u.name as author_name, u.avatar as author_avatar, u.level_name as author_level_name
                        FROM `fede_comments` c
                        JOIN `fede_users` u ON c.user_id = u.id
                        WHERE c.post_id = ?
                        ORDER BY c.created_at ASC
                    ");
                    $comm_stmt->execute([$dp['id']]);
                    $db_comments = $comm_stmt->fetchAll();

                    $comments_list = [];
                    foreach ($db_comments as $dc) {
                        $comments_list[] = [
                            'id' => 'comm_' . $dc['id'],
                            'author' => [
                                'name' => $dc['author_name'],
                                'avatar' => $dc['author_avatar'] ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80',
                                'level_name' => $dc['author_level_name']
                            ],
                            'content' => $dc['content'],
                            'likes' => (int)$dc['likes_count'],
                            'created_at' => date('d/m H:i', strtotime($dc['created_at']))
                        ];
                    }

                    $parsed_posts[] = [
                        'id' => (string)$dp['id'],
                        'category' => $dp['category_id'],
                        'pinned' => (bool)$dp['pinned'],
                        'author' => [
                            'id' => (string)$dp['user_id'],
                            'name' => $dp['author_name'],
                            'handle' => $dp['author_handle'],
                            'avatar' => $dp['author_avatar'] ?: '/assets/img/fede_nowback_fuego.jpg',
                            'is_host' => ($dp['author_role'] === 'admin'),
                            'level_name' => ($dp['author_role'] === 'admin' ? '👑 MENTOR & HOST' : ('Nivel ' . $dp['author_level'] . ' • ' . $dp['author_level_name'])),
                            'badge' => ($dp['author_role'] === 'admin' ? '👑 HOST' : ('⚡ Rango ' . $dp['author_level']))
                        ],
                        'title' => $dp['title'],
                        'content' => $dp['content'],
                        'likes' => (int)$dp['likes_count'],
                        'liked_by' => $liked_users,
                        'created_at' => date('d/m H:i', strtotime($dp['created_at'])),
                        'comments' => $comments_list
                    ];
                }
                $data['posts'] = $parsed_posts;
            }

            // 3. Fetch Meets from MySQL
            $db_meets = $pdo->query("SELECT * FROM `fede_meets` ORDER BY `id` DESC LIMIT 15")->fetchAll();
            if (!empty($db_meets)) {
                $parsed_meets = [];
                foreach ($db_meets as $dm) {
                    $parsed_meets[] = [
                        'id' => (string)$dm['id'],
                        'title' => $dm['title'],
                        'description' => $dm['description'],
                        'date' => $dm['meet_date'],
                        'time' => $dm['meet_time'],
                        'platform' => $dm['platform'] ?: 'Zoom Pro',
                        'zoom_url' => $dm['zoom_url'],
                        'google_cal_url' => $dm['google_cal_url'],
                        'attendees' => 38
                    ];
                }
                $data['meets'] = $parsed_meets;
            }

            // 4. Fetch Courses & Lessons from MySQL
            $db_courses = $pdo->query("SELECT * FROM `fede_courses` ORDER BY `order_num` ASC, `id` ASC")->fetchAll();
            if (!empty($db_courses)) {
                $parsed_courses = [];
                foreach ($db_courses as $c) {
                    $mods = $pdo->prepare("SELECT * FROM `fede_modules` WHERE `course_id` = ? ORDER BY `order_num` ASC");
                    $mods->execute([$c['id']]);
                    $db_mods = $mods->fetchAll();

                    $parsed_mods = [];
                    $total_lessons_calc = 0;
                    foreach ($db_mods as $m) {
                        $less = $pdo->prepare("SELECT * FROM `fede_lessons` WHERE `module_id` = ? ORDER BY `order_num` ASC");
                        $less->execute([$m['id']]);
                        $db_less = $less->fetchAll();

                        $parsed_less = [];
                        foreach ($db_less as $l) {
                            $total_lessons_calc++;
                            $parsed_less[] = [
                                'id' => (string)$l['id'],
                                'title' => $l['title'],
                                'duration' => $l['duration'],
                                'video_url' => $l['video_url'],
                                'description' => $l['description'],
                                'action_items' => json_decode($l['action_items'] ?? '[]', true) ?: [],
                                'resources' => json_decode($l['resources'] ?? '[]', true) ?: []
                            ];
                        }
                        $parsed_mods[] = [
                            'module_id' => (string)$m['id'],
                            'title' => $m['title'],
                            'lessons' => $parsed_less
                        ];
                    }

                    $parsed_courses[] = [
                        'id' => (string)$c['id'],
                        'title' => $c['title'],
                        'slug' => $c['slug'],
                        'level_required' => (int)$c['level_required'],
                        'level_name' => $c['level_name'],
                        'thumbnail' => $c['thumbnail'] ?: '/assets/img/fede_nowback_hero.jpg',
                        'description' => $c['description'],
                        'total_lessons' => $total_lessons_calc ?: (int)$c['total_lessons'],
                        'duration' => $c['duration'],
                        'modules' => $parsed_mods
                    ];
                }
                $data['courses'] = $parsed_courses;
            }

            // 5. Fetch Plans & Pricing from MySQL
            $db_plans = $pdo->query("SELECT * FROM `fede_plans` WHERE `is_active` = 1 ORDER BY `order_num` ASC, `id` ASC")->fetchAll();
            if (!empty($db_plans)) {
                $parsed_plans = [];
                foreach ($db_plans as $dp) {
                    $parsed_plans[] = [
                        'id' => (string)$dp['id'],
                        'slug' => $dp['slug'],
                        'name' => $dp['name'],
                        'badge' => $dp['badge'],
                        'price_ars' => (int)$dp['price_ars'],
                        'price_usd' => (int)$dp['price_usd'],
                        'period' => $dp['period'],
                        'description' => $dp['description'],
                        'features' => json_decode($dp['features_json'] ?? '[]', true) ?: [],
                        'checkout_url' => $dp['checkout_url'],
                        'is_active' => (bool)$dp['is_active']
                    ];
                }
                $data['plans'] = $parsed_plans;
            }

            // 6. Fetch Settings from MySQL
            $db_settings = $pdo->query("SELECT * FROM `fede_settings`")->fetchAll(PDO::FETCH_KEY_PAIR);
            $data['settings'] = $db_settings ?: [
                'enable_gamification' => '0',
                'community_name' => 'Campus Fede Nowback Pro',
                'admin_whatsapp' => '5491138205570'
            ];

            // 7. Fetch Members & Leaderboard from MySQL
            $db_users = $pdo->query("SELECT * FROM `fede_users` ORDER BY `points` DESC LIMIT 50")->fetchAll();
            if (!empty($db_users)) {
                $leaderboard = [];
                $members = [];
                $rank = 1;
                foreach ($db_users as $du) {
                    $u_item = [
                        'id' => (string)$du['id'],
                        'name' => $du['name'],
                        'handle' => $du['handle'],
                        'email' => $du['email'],
                        'avatar' => $du['avatar'] ?: '/assets/img/fede_avatar_mini.png',
                        'role' => $du['role'],
                        'points' => (int)$du['points'],
                        'level' => (int)$du['level'],
                        'level_name' => $du['level_name'],
                        'badge' => ($du['role'] === 'admin' ? '👑 HOST' : '⚡ Rango ' . $du['level']),
                        'bio' => $du['bio'],
                        'is_current_user' => (isset($_SESSION['fede_user']['email']) && $_SESSION['fede_user']['email'] === $du['email'])
                    ];
                    $members[] = $u_item;
                    $leaderboard[] = array_merge($u_item, ['rank' => $rank++]);
                }
                $data['members'] = $members;
                $data['leaderboard'] = $leaderboard;
            }

            // 8. Fetch Chat Messages from MySQL
            $db_chat = $pdo->query("
                SELECT cm.*, u.name as author_name, u.avatar as author_avatar, u.role as author_role
                FROM `fede_chat_messages` cm
                JOIN `fede_users` u ON cm.user_id = u.id
                WHERE cm.room = 'general'
                ORDER BY cm.created_at ASC
                LIMIT 50
            ")->fetchAll();

            if (!empty($db_chat)) {
                $chat_list = [];
                foreach ($db_chat as $dc) {
                    $chat_list[] = [
                        'id' => (string)$dc['id'],
                        'author' => $dc['author_name'],
                        'avatar' => $dc['author_avatar'] ?: '/assets/img/fede_avatar_mini.png',
                        'is_host' => ($dc['author_role'] === 'admin'),
                        'content' => $dc['content'],
                        'time' => date('H:i', strtotime($dc['created_at']))
                    ];
                }
                $data['chat_messages'] = $chat_list;
            }

        } catch (Exception $e) {
            error_log("Error loading community data from MySQL: " . $e->getMessage());
        }
    }

    return $data;
}

/**
 * Get Setting Value
 */
function fede_get_setting($key, $default = '') {
    $pdo = fede_db();
    if ($pdo) {
        $stmt = $pdo->prepare("SELECT `setting_value` FROM `fede_settings` WHERE `setting_key` = ?");
        $stmt->execute([$key]);
        $val = $stmt->fetchColumn();
        if ($val !== false) return $val;
    }
    return $default;
}

/**
 * Set Setting Value
 */
function fede_set_setting($key, $value) {
    $pdo = fede_db();
    if ($pdo) {
        $stmt = $pdo->prepare("
            INSERT INTO `fede_settings` (`setting_key`, `setting_value`)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE `setting_value` = VALUES(`setting_value`)
        ");
        return $stmt->execute([$key, (string)$value]);
    }
    return false;
}
