// Importar jQuery y asignarlo a window
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'summernote/dist/summernote-bs4.min.js';

// Importar Moment.js
import moment from 'moment';
window.moment = moment;

//Importar Tempus Dominus Bootstrap 4
require('tempusdominus-bootstrap-4');

// Importar otros plugins que dependen de jQuery
import '../adminlte/plugins/jquery/jquery.min.js';
import '../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import '../adminlte/dist/js/adminlte.js';

import './components/sidebar.js';
import './curso/components/navbar.js';

import './curso/detalle-curso.js';
import './curso/video.js';
import './curso/cuestionario.js';
import './curso/guia-curso.js';
import './curso/contenido-curso.js';
import './curso/dian-components/new-dian.js';
import './curso/dian-components/formulario-dian.js';
import './curso/dian-components/create-form-dian.js';
import './curso/dian-components/formulario-110-dian.js';
import './curso/dian-components/resultados-110-dian.js';
import './curso/dian-components/left-panel.js';
import './curso/dian-components/right-panel.js';
import './rutas/view-rutas.js';
import './rutas/list-rutas.js';

import './user/ajustes.js';

import './purchase/purchase.js';
import './lesson/questionario.js';

import './groups/groups.js';
import './groups/members.js';
import './groups/link-new-user.js';
import './groups/delete-user.js';
import './groups/delete-lesson.js';
import './groups/create-lesson.js';
import './groups/edit-lesson.js';

import './curso/interactivo/interactivo.js';
import './curso/interactivo/tabla-causaciones.js';
//import '../adminlte/';