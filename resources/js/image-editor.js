import 'tui-image-editor/dist/tui-image-editor.css';
import ImageEditor from 'tui-image-editor';
import $ from 'jquery';

$(document).ready(function () {
    const editor = new ImageEditor(document.getElementById('ImageEditor'), {
        includeUI: {
            loadImage: {
                path: '/img/sampleImage.jpg',
                name: 'SampleImage'
            },
            theme: {},
            menu: ['shape', 'text', 'filter'],
        },
        cssMaxWidth: 1000,
        cssMaxHeight: 800,
        selectionStyle: {
            cornerSize: 20,
            rotatingPointOffset: 70
        }
    });
});
