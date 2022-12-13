class Sprite {
    constructor({
        position,
        velocity,
        image,
        frames = {max: 1, hold: 10},
        sprites,
        animate = false,
        isEnemy = false,
        name,
    }){
        this.position = position
        this.image = image
        this.frames = {...frames, val: 0, elapsed: 0}
        this.image.onload = () => {
            this.width = this.image.width / this.frames.max
            this.height = this.image.height
        }
        this.animate = animate
        this.sprites = sprites
        this.opacity = 1.0
        this.health = 100
        this.isEnemy = isEnemy
        this.name = name

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
    attack({attack, recipient}){

        document.querySelector('#dialogueBox').style.display = 'block'
        document.querySelector('#dialogueBox').innerHTML = this.name + ' used ' + attack.name 
        switch (attack.name){}
        const tl =  gsap.timeline()
        this.health -= attack.damage
        let movementDistance = 20
        if (this.isEnemy) movementDistance = -20

        let healthBar = '#enemyHealthBar'
        if (this.isEnemy) healthBar = '#playerHealthBar'

        tl.to(this.position, {
            x: this.position.x - 20 + movementDistance * 2
        }).to(this.position,{
            x: this.position.x + 40,
            duration: 0.1,
            onComplete: () => {
                // enemy gets hit
                gsap.to('#enemyHealthBar', {
                    width: this.health + '%'
                })
                gsap.to(recipient.position, {
                    x: recipient.position.x + 10,
                    yoyo: true, 
                    repeat: 5,
                    duration: 0.08,
                    opacity: 0.001
                })
                gsap.to(recipient, {
                    opacity: 0.001,
                    repeat: 5,
                    yoyo: true,
                    duration: 0.08
                })
            }
        }).to(this.position,{
            x: this.position.x
        })
    }
}

export { Sprite }