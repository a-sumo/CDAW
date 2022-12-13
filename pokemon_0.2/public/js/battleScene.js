const battleBackgroundImage = new Image()
battleBackgroundImage.src = './img/battleBackground.png'

const battleBackground = new Sprite({
    position: {
        x: 0,
        y: -100
    },
    image: battleBackgroundImage
})
const draggleImage = new Image()
draggleImage.src = './img/draggleSprite.png'
const draggle = new Sprite({
    position: {
        x: 700,
        y: 120
    },
    image: draggleImage,
    frames: {
        max: 4,
        hold: 30
    },
    animate: true,
    isEnemy: true,
    name: 'Draggle'
})

const emby = new Sprite({
    position: {
        x: 400,
        y: 340
    },
    image: embyImage,
    frames: {
        max: 4,
        hold: 20
    },
    animate: true,
    name: 'Emby'
})
const renderedSprites = [draggle, emby]
const button = document.createElement('button')
button.innerHTML = 'Fireball'
button.classList.add("bg-white","hover:bg-gray-100", "text-gray-800")
document.querySelector('#attacksBox').append(button)
function animateBattle(){
    window-requestAnimationFrame(animateBattle)
    battleBackground.draw()
    renderedSprites.forEach((sprite) => {
        sprite.draw()
    })
}