import { collisions } from '../data/collisions.js';
import { battleZonesData } from '../data/battleZones.js';
import { monsters } from './monsters.js';
import { attacks } from './attacks.js';

// create game canvas
const canvas = document.querySelector('canvas');
const c = canvas.getContext('2d');
canvas.width = 1024;
canvas.height = 576;

// load collisions 1-d array into collisionsMap 2-d array
const collisionsMap = [];
for (let i = 0; i < collisions.length; i+= 70){
    collisionsMap.push(collisions.slice(i, 70 + i));
}
// load battleZones 1-d array into battleZonesMap 2-d array
const battleZonesMap = [];
for (let i = 0; i < battleZonesData.length; i+= 70){
    battleZonesMap.push(battleZonesData.slice(i, 70 + i));
}

class Sprite {
    constructor({
        position,
        velocity,
        image,
        frames = {max: 1, hold: 10},
        sprites,
        animate = false,
    }){
        this.position = position;
        this.image = new Image()
        this.frames = {...frames, val: 0, elapsed: 0};
        this.image.onload = () => {
            this.width = this.image.width / this.frames.max
            this.height = this.image.height
        }
        this.image.src = image.src

        this.animate = animate;
        this.sprites = sprites;
        this.opacity = 1.0;

    }

    draw(){
        c.save()
        c.globalAlpha = this.opacity
        c.drawImage(
            this.image, 
            this.frames.val * this.width,
            0,
            this.image.width / this.frames.max,
            this.image.height,
            this.position.x,
            this.position.y,
            this.image.width / this.frames.max,
            this.image.height,
        )
        c.restore()
        // move player sprite only when keyboard is pressed
        if(!this.animate) return

        if (this.frames.max > 1){
            this.frames.elapsed++
        }
        if (this.frames.elapsed % this.frames.hold === 0){
            if (this.frames.val < this.frames.max - 1) this.frames.val++
            else this.frames.val = 0            
        }
    }
}
class Monster extends Sprite {
    constructor({        
        position,
        velocity,
        image,
        frames = {max: 1, hold: 10},
        sprites,
        animate = false,
        isEnemy = false,
        name,
        attacks
    }) {
        super({
            position,
            velocity,
            image,
            frames,
            sprites,
            animate,
        })
        this.isEnemy = isEnemy
        this.health = 100
        this.name = name
        this.attacks = attacks
    }
    attack({attack, recipient}){
        document.querySelector('#dialogueBox').style.display = 'block';
        document.querySelector('#dialogueBox').innerHTML = this.name + ' used ' + attack.name; 
        const tl =  gsap.timeline();
        recipient.health -= attack.damage;
        let movementDistance = 20;
        if (this.isEnemy) movementDistance = -20;

        let healthBar = '#enemyHealthBar';
        if (this.isEnemy) healthBar = '#playerHealthBar';

        tl.to(this.position, {
            x: this.position.x - 20 + movementDistance * 2
        })
        .to(this.position,{
            x: this.position.x + 40,
            duration: 0.1,
            onComplete: () => {
                // enemy gets hit
                
                gsap.to(healthBar, {
                    width: recipient.health + '%'
                })
                gsap.to(recipient.position, {
                    x: recipient.position.x + 10,
                    yoyo: true, 
                    repeat: 5,
                    duration: 0.08,
                    opacity: 0.001
                })
                gsap.to(recipient, {
                    opacity: 0,
                    repeat: 5,
                    yoyo: true,
                    duration: 0.08
                })
            }
        }).to(this.position,{
            x: this.position.x
        })
    } 
    faint() {
        document.querySelector('#dialogueBox').innerHTML = this.name + ' fainted!'; 
        gsap.to(this.position, {
            y: this.position.y + 20
        })
        gsap.to(this, {
            opacity: 0
        })
    }
}
class Boundary {
    static width = 48;
    static height = 48;
    constructor({position}){
        this.position = position;
        this.width = 48;
        this.height = 48;
    }
    draw(){
        c.fillStyle = 'rgba(255, 0, 0, 0)';
        c.fillRect(this.position.x, this.position.y, this.width, this.height);
    };
}

const boundaries = [];
const offset = {
    x:-1074,
    y:-900
};
collisionsMap.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if(symbol === 1025){
            boundaries.push(
                new Boundary({
                    position:{
                        x: j * Boundary.width + offset.x,
                        y: i * Boundary.height + offset.y,
                    }
                })
            )
        }
    })
})
c.fillStyle = 'white';
c.fillRect(0, 0, canvas.width, canvas.height);

const battleZones = [];
battleZonesMap.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if(symbol === 1025){
            battleZones.push(
                new Boundary({
                    position:{
                        x: j * Boundary.width + offset.x,
                        y: i * Boundary.height + offset.y,
                    }
                })
            )
        }
    })
})
const image = new Image();
image.src = "./img/Peach Town.png";

const foregroundImage = new Image();
foregroundImage.src = "./img/foregroundObjects.png";

const playerDownImage = new Image();
playerDownImage.src = './img/playerDown.png';

const playerUpImage = new Image();
playerUpImage.src = './img/playerUp.png';

const playerLeftImage = new Image();
playerLeftImage.src = './img/playerLeft.png';

const playerRightImage = new Image();
playerRightImage.src = './img/playerRight.png';

image.onload = () => {
    c.drawImage(image, -1000, -850)
    c.drawImage(
        image, 
        0,
        0,
        image.width / 4,
        image.height,
        canvas.width/2 - (image.width/4)/2, 
        canvas.height/2  - image.height/2,
        image.width / 4,
        image.height,
    )
}

const player = new Sprite({
    position: {
        x: canvas.width / 2 - (192 / 4) / 2, 
        y: canvas.height / 2  - 68 / 2,
    },
    image: playerDownImage,
    frames: {
        max: 4,
        hold: 10
    },
    sprites: {
        up: playerUpImage,
        left: playerLeftImage,
        right: playerRightImage,
        down: playerDownImage,
    }
});

const background = new Sprite({
    position: {
        x: offset.x,
        y: offset.y
    },
    image: image
});
const foreground = new Sprite({
    position: {
        x: offset.x,
        y: offset.y
    },
    image: foregroundImage
});
const keys = {
    w: {
        pressed: false
    },
    a: {
        pressed: false
    },
    s: {
        pressed: false
    },
    d: {
        pressed: false
    },
};
document.querySelector('#userInterface').style.display = 'none'
const testBoundary = new Boundary({
    position:{
        x: 400,
        y: 400
    }
});
const movables = [background, ...boundaries, foreground, ...battleZones];

function rectangularCollision({ rectangle1, rectangle2}){
    return (
        rectangle1.position.x + rectangle1.width >= rectangle2.position.x && 
        rectangle1.position.x <= rectangle2.position.x + rectangle2.width &&
        rectangle1.position.y <= rectangle2.position.y + rectangle2.height &&
        rectangle1.position.y + rectangle1.height >= rectangle2.position.y 
    )
}
const battle = { initiated: false };
let animationId 
function animate(){
    animationId = window.requestAnimationFrame(animate)
    background.draw()
    boundaries.forEach(boundary =>{
        boundary.draw()

    })
    battleZones.forEach(boundary =>{
        boundary.draw()
    })
    player.draw()
    foreground.draw()

    let moving = true
    player.animate = false

    if (battle.initiated) return
    if (keys.w.pressed || keys.a.pressed || keys.s.pressed || keys.d.pressed){
        // check if player is inside a battlezone
        for (let i=0; i < battleZones.length; i++){
            const battleZone = battleZones[i]
            // overlapping area between player sprite and battlezone
            const overlappingArea = 
            (Math.min(player.position.x + player.width,
                battleZone.position.x + battleZone.width) 
                - Math.max(player.position.x, battleZone.position.x)) * 
            (Math.min(player.position.y + player.height, 
                battleZone.position.y + battleZone.height)
                - Math.max(player.position.y, battleZone.position.y))
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: battleZone
                }) 
                &&
                overlappingArea > (player.width * player.height) / 2 &&
                Math.random() < 0.99
            ) {
                // deactivate current animation loop
                window.cancelAnimationFrame(animationId)
                battle.initiated = true
                gsap.to("#overlappingDiv", {
                    opacity: 1,
                    repeat: 3,
                    yoyo: true,
                    duration: 0.4,
                    onComplete(){
                        gsap.to("#overlappingDiv",
                        {
                            opacity: 1,
                            duration: 0.4,
                            onComplete(){
                                // activate  new animation loop
                                initBattle()
                                animateBattle()
                                gsap.to('#overlappingDiv', {
                                    opacity: 0,
                                    duration: 0.4
                                })
                            }
                        })
                    }
                })
                // exit collision checking loop
                break
            }
        }
    }
    if (keys.w.pressed && lastKey === 'w') {
        player.animate = true
        player.image = player.sprites.up
        for (let i=0; i < boundaries.length; i++){
            const boundary = boundaries[i]
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary, position:{
                        x: boundary.position.x,
                        y: boundary.position.y + 3
                    }}
                })
            ) {
                console.log('colliding');
                moving = false
                break
            }
        }
        if(moving){
            movables.forEach((movable) => {
                movable.position.y += 3
            })
        }
    }
    else if (keys.a.pressed && lastKey === 'a' ) {
        player.animate = true
        player.image = player.sprites.left
        for (let i=0; i < boundaries.length; i++){
            const boundary = boundaries[i]
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary, position:{
                        x:boundary.position.x + 3,
                        y: boundary.position.y,
                    }}
                })
            ) {
                console.log('colliding');
                moving = false
                break
            }
        }
        if(moving){
            movables.forEach((movable) => {
                movable.position.x += 3
            })
        }

    }
    else if (keys.s.pressed && lastKey === 's') {
        player.animate = true
        player.image = player.sprites.down
        for (let i=0; i < boundaries.length; i++){
            const boundary = boundaries[i]
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary, position:{
                        x:boundary.position.x,
                        y: boundary.position.y - 3
                    }}
                })
            ) {
                console.log('colliding');
                moving = false
                break
            }
        }
        if(moving){
            movables.forEach((movable) => {
                movable.position.y -= 3
            })
        }

    }
    else if (keys.d.pressed && lastKey === 'd') {
        player.animate = true
        player.image = player.sprites.right
        for (let i=0; i < boundaries.length; i++){
            const boundary = boundaries[i]
            if (
                rectangularCollision({
                    rectangle1: player,
                    rectangle2: {...boundary, position:{
                        x: boundary.position.x - 3,
                        y: boundary.position.y,
                    }}
                })
            ) {
                console.log('colliding');
                moving = false
                break
            }
        }
        if(moving){
            movables.forEach((movable) => {
                movable.position.x -= 3
            })
        }

    }
}

animate()
const battleBackgroundImage = new Image()
battleBackgroundImage.src = './img/battleBackground.png'

const battleBackground = new Sprite({
    position: {
        x: 0,
        y: -100
    },
    image: battleBackgroundImage
})

let draggle
let emby 
let renderedSprites
let queue 



function initBattle(){
    document.querySelector('#userInterface').style.display = 'block'
    document.querySelector('#dialogueBox').style.display = 'none'
    document.querySelector('#enemyHealthBar').style.width = '100%'
    document.querySelector('#playerHealthBar').style.width = '100%'
    document.querySelector('#attacksBox').replaceChildren()

    draggle = new Monster(monsters.Draggle)
    emby = new Monster(monsters.Emby)
    renderedSprites = [draggle, emby]
    queue = []
    emby.attacks.forEach((attack) => {
        const button = document.createElement('button')
        button.innerHTML = attack.name
        button.classList.add("bg-white","hover:bg-gray-100", "text-gray-800")
        document.querySelector('#attacksBox').append(button)
    })

    document.querySelectorAll('button').forEach((button) => {
        button.addEventListener('click', (e) => {
            const selectedAttack = attacks[e.currentTarget.innerHTML]
            emby.attack({
                attack: selectedAttack,
                recipient: draggle
            })
            if(draggle.health <= 0){
                queue.push(()=>{
                    draggle.faint()
                })
                queue.push(()=>{
                    gsap.to('#overlappingDiv', {
                        opacity: 1,
                        onComplete: () => {
                            battle.initiated = false
                            animate()
                            document.querySelector('#userInterface').style.display = 'none'
                            gsap.to('#overlappingDiv', {
                                opacity: 0
                            })
                            battle.initiated = false
                        }
                    })
                })
            }
            // enemy attack
            const randomAttack = draggle.attacks[Math.floor(Math.random() * draggle.attacks.length)]
            
            queue.push(() => {
                draggle.attack({
                    attack: randomAttack, 
                    recipient: emby,
                    renderedSprites
                })
    
                if (emby.health <=0){
                    queue.push(() => {
                        emby.faint()
                    })
                    queue.push(()=>{
                        gsap.to('#overlappingDiv', {
                            opacity: 1,
                            onComplete: () => {
                                battle.initiated = false
                                cancelAnimationFrame(battleAnimationId)
                                animate()
                                document.querySelector('#userInterface').style.display = 'none'
                                gsap.to('#overlappingDiv', {
                                    opacity: 0
                                })
                                battle.initiated = false
                            }
                        })
                    })
                }
            })
        })
        button.addEventListener('mouseenter', (e)=> {
            const selectedAttack = attacks[e.currentTarget.innerHTML]
            document.querySelector('#attackType').innerHTML = selectedAttack.type
            document.querySelector('#attackType').style.color = selectedAttack.color
        })
    })
}

let battleAnimationId

function animateBattle(){
    battleAnimationId = window.requestAnimationFrame(animateBattle)
    battleBackground.draw()
    renderedSprites.forEach((sprite) => {
        sprite.draw()
    })
}

document.querySelector('#dialogueBox').addEventListener('click', (e) => {
    if (queue.length > 0){
        queue[0]()
        queue.shift()
    } else e.currentTarget.style.display = 'none'
})
// event listeners for buttons 
document.querySelectorAll('button').forEach((button) => {
    button.addEventListener('click', (e) => {
        console.log('clicked')
        const selectedAttack = attacks[e.currentTarget.innerHTML]
        emby.attack({
            attack: selectedAttack,
            recipient: draggle
        })
        if(draggle.health <= 0){
            queue.push(()=>{
                draggle.faint()
            })
            queue.push(()=>{
                //fade back to black
                gsap.to('#overlappingDiv', {
                    opacity: 1,
                    onComplete: () => {
                        cancelAnimationFrame(battleAnimationId)
                        animate()
                        document.querySelector('#userInterface').style.display = 'none'
                        gsap.to('#overlappingDiv', {
                            opacity: 0
                        })
                        battle.initiated = false
                    }
                })
            })
        }
        // enemy attack
        const randomAttack = draggle.attacks[Math.floor(Math.random() * draggle.attacks.length)]
        
        queue.push(() => {
            draggle.attack({
                attack: randomAttack, 
                recipient: emby,
                renderedSprites
            })

            if (emby.health <=0){
                queue.push(() => {
                    emby.faint()
                })
                // end battle
                queue.push(()=>{
                    gsap.to('#overlappingDiv', {
                        opacity: 1,
                        onComplete: () => {
                            cancelAnimationFrame(battleAnimationId)
                            animate()
                            document.querySelector('#userInterface').style.display = 'none'
                            gsap.to('#overlappingDiv', {
                                opacity: 0
                            })
                            battle.initiated = false
                        }
                    })
                })
            }
        })
    })
    button.addEventListener('mouseenter', (e)=> {
        const selectedAttack = attacks[e.currentTarget.innerHTML]
        document.querySelector('#attackType').innerHTML = selectedAttack.type
        document.querySelector('#attackType').style.color = selectedAttack.color
    })
})
let lastKey = ''
window.addEventListener('keydown', (e) => {
    switch (e.key){
        case 'w':
            keys.w.pressed = true
            lastKey = 'w'
            break
        case 'a':
            keys.a.pressed = true
            lastKey = 'a'
            break
        case 's':
            keys.s.pressed = true
            lastKey = 's'
            break
        case 'd':
            keys.d.pressed = true
            lastKey = 'd'
            break
    }
})
window.addEventListener('keyup', (e) => {
    switch (e.key){
        case 'w':
            keys.w.pressed = false
            break
        case 'a':
            keys.a.pressed = false
        break
        case 's':
            keys.s.pressed = false
            break
        case 'd':
            keys.d.pressed = false
            break
    }
})


