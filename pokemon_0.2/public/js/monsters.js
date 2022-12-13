
import { attacks } from './attacks.js';

const draggleImage = new Image();
draggleImage.src = './img/draggleSprite.png';
const embyImage = new Image();
embyImage.src = './img/embySprite.png';

export const monsters = {
    Emby: {
        position: {
            x: 400,
            y: 340
        },
        image: {
            src: './img/embySprite.png'
        },
        frames: {
            max: 4,
            hold: 20
        },
        animate: true,
        name: 'Emby',
        attacks: [attacks.Tackle, attacks.Fireball]
    },
    Draggle: {
        position: {
            x: 700,
            y: 120
        },
        image: {
            src: './img/draggleSprite.png'
        },
        frames: {
            max: 4,
            hold: 20
        },
        animate: true,
        isEnemy: true,
        name: 'Draggle',
        attacks: [attacks.Tackle, attacks.Fireball]
    }
}
