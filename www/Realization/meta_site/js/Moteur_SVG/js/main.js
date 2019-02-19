document.addEventListener('DOMContentLoaded', function () {
    var forme = document.querySelector('#forme');
    forme.onchange = function () {
        var formulaire = document.querySelector('#informationForme');
        switch (forme.value) {
            case 'rectangle':

                formulaire.innerHTML = '  <p>\n' +
                    '                <label for="opacity">choisisez l\'opacité de votre rectangle (rentrer un nombre a vergule entre 0 et 1) :\n' +
                    '                    <input type="number" name="opacity" min="0" max="1" step="0.01">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '\n' +
                    '            <p>\n' +
                    '                <label for="posX">choisisez la position x de votre rectangle :\n' +
                    '                    <input type="number" name="posX">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posY">choisisez la position y de votre rectangle :\n' +
                    '                    <input type="number" name="posY">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="color">choisisez la couleur de votre rectangle :\n' +
                    '                    <input type="text" name="color">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="height">choisisez hauteur de votre rectangle :\n' +
                    '                    <input type="number" name="height">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="width">choisisez largeur de votre rectangle :\n' +
                    '                    <input type="number" name="width">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '<input type="hidden" name="FormePJs" value="' + forme.value + '">\n' +
                    '                  <input type="submit" name="valide" value="valide">';
                break;
            case 'Care' :
                formulaire.innerHTML = '  <p>\n' +
                    '                <label for="opacity">choisisez l\'opacité de votre carée (rentrer un nombre a vergule entre 0 et 1) :\n' +
                    '                    <input type="number" name="opacity" min="0" max="1" step="0.01">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '\n' +
                    '            <p>\n' +
                    '                <label for="posX">choisisez la position x de votre carée :\n' +
                    '                    <input type="number" name="posX">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posY">choisisez la position y de votre carée :\n' +
                    '                    <input type="number" name="posY">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="color">choisisez la couleur de votre carée :\n' +
                    '                    <input type="text" name="color">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="cote">choisisez la taille du cote de votre carée:\n' +
                    '                    <input type="number" name="cote">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '<input type="hidden" name="FormePJs" value="' + forme.value + '">\n' +
                    '                  <input type="submit" name="valide" value="valide">';
                break;
            case 'Elipse':
                formulaire.innerHTML = '  <p>\n' +
                    '                <label for="opacity">choisisez l\'opacité de votre elipse (rentrer un nombre a vergule entre 0 et 1) :\n' +
                    '                    <input type="number" name="opacity" min="0" max="1" step="0.01">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posX">choisisez la position x de votre elipse :\n' +
                    '                    <input type="number" name="posX">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posY">choisisez la position y de votre elipse :\n' +
                    '                    <input type="number" name="posY">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="color">choisisez la couleur de votre elipse :\n' +
                    '                    <input type="text" name="color">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '             <p>\n' +
                    '                <label for="horizontal_radius">choisisez la diametre horizontal de votre elipse:\n' +
                    '                    <input type="number" name="horizontal_radius">\n' +
                    '                </label>\n' +
                    '                </p>\n' +
                    '            <p>\n' +
                    '                <label for="vertical_radius">choisisez la diametre vertical de votre elipse:\n' +
                    '                    <input type="number" name="vertical_radius">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '<input type="hidden" name="FormePJs" value="' + forme.value + '">\n' +
                    '                  <input type="submit" name="valide" value="valide">';
                break;
            case 'Cercle':
                formulaire.innerHTML = '  <p>\n' +
                    '                <label for="opacity">choisisez l\'opacité de votre Cercle (rentrer un nombre a vergule entre 0 et 1) :\n' +
                    '                    <input type="number" name="opacity" min="0" max="1" step="0.01">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posX">choisisez la position x de votre Cercle :\n' +
                    '                    <input type="number" name="posX">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="posY">choisisez la position y de votre Cercle :\n' +
                    '                    <input type="number" name="posY">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="color">choisisez la couleur de votre Cercle :\n' +
                    '                    <input type="text" name="color">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '             <p>\n' +
                    '                <label for="radius">choisisez la diametre de votre Cercle:\n' +
                    '                    <input type="number" name="radius">\n' +
                    '                </label>\n' +
                    '                </p>\n' +
                    '<input type="hidden" name="FormePJs" value="' + forme.value + '">\n' +
                    '                  <input type="submit" name="valide" value="valide">';
                break;
            case 'triangle':
                formulaire.innerHTML = '  <p>\n' +
                    '                <label for="opacity">choisisez l\'opacité de votre triangle (rentrer un nombre a vergule entre 0 et 1) :\n' +
                    '                    <input type="number" name="opacity" min="0" max="1" step="0.01">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="color">choisisez la couleur de votre triangle :\n' +
                    '                    <input type="text" name="color">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '            <p>\n' +
                    '                <label for="px1">choisisez le point x 1  de votre triangle :\n' +
                    '                    <input type="number" name="px1">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '             <p>\n' +
                    '                <label for="py1">choisisez le point y 1 de votre triangle:\n' +
                    '                    <input type="number" name="py1">\n' +
                    '                </label>\n' +
                    '                </p>\n' +
                    '            <p>\n' +
                    '                <label for="px2">choisisez le point x 2 de votre triangle :\n' +
                    '                    <input type="number" name="px2">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '             <p>\n' +
                    '                <label for="py2">choisisez le point y 2 de votre triangle:\n' +
                    '                    <input type="number" name="py2">\n' +
                    '                </label>\n' +
                    '                </p>\n' +
                    '            <p>\n' +
                    '                <label for="px3">choisisez le point x 3 de votre triangle :\n' +
                    '                    <input type="number" name="px3">\n' +
                    '                </label>\n' +
                    '            </p>\n' +
                    '             <p>\n' +
                    '                <label for="py1">choisisez le point y 3 de votre triangle:\n' +
                    '                    <input type="number" name="py3">\n' +
                    '                </label>\n' +
                    '                </p>\n' +
                    '<input type="hidden" name="FormePJs" value="' + forme.value + '">\n' +
                    '                  <input type="submit" name="valide" value="valide">';
                break;
        }
    }
});