<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "home") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>HOME</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "homeadmin") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>HOME ADMIN</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "crea") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>CREA PREGUNTAS</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "listalu") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>LISTA ALUMNOS</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "alta") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>DAR ALTA</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "test") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>LISTADO TEST</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
    if ($_GET['menu'] == "examen") {
        echo '<div class="dropdown">
            <input type="checkbox" id="dropdown">
            <label class="dropdown__face" for="dropdown">
                <div class="dropdown__text"><img id="logo" src="/css/imagenes/logo.png" alt="Logo"></div>
                <div class="titulo">
                    <h1>EXAMEN</h1>
                </div>
                <div class="dropdown__arrow"><i class="fa-solid fa-bars fa-xl"></i></div>
            </label>

            <ul class="dropdown__items">
                <li><i class="fa-solid fa-user" style="color: #000000;"></i>Perfil</li><br>
                <li><i class="fa-solid fa-gear"></i>Ajustes</li><br>
                <li id="cerrar"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000;"></i>Cerrar sesion</li>
            </ul>
        </div>';

        echo '<svg>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </svg>';
    }
}
?>
