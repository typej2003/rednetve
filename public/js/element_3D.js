// JavaScript Integrado
        document.addEventListener('DOMContentLoaded', () => {
            const contenedor = document.getElementById('inicio_container');
            const FICHA_SIZE = 100;
            const VISUAL_HEIGHT = 100; 

            // Array de configuración con los 5 SVGs solicitados
            const configuracionFichas = [
                { 
                    id: 'ficha-fb', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.008 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.943 0-1.29.585-1.29 1.25V8.05h2.22l-.356 2.072H10.5V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>', 
                    velocidadX: 1.5, velocidadY: 1.0 
                },
                { 
                    id: 'ficha-tw', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16"><path d="M12.675 11.884v1.391H14.1v-1.391h1.5v-1.5h-1.5v-1.5h-1.5v1.5h-1.425l-4.57 4.298zM.024 1.877a.64.64 0 0 1 .846-.051C2.088 2.22 3.2 2.68 4.22 3.23l.47-1.12c.57-.45 1.2-.82 1.86-1.13.23-.1.49-.15.75-.16a.82.82 0 0 1 .49.07c.18.06.35.14.51.24.16.1.3.2.42.33.12.12.22.25.29.39.07.14.12.29.14.44.02.15.02.3-.01.44-.03.14-.08.27-.16.39l-.02-.02c-.52.87-1.12 1.68-1.8 2.4l.43.02c.8.03 1.58.16 2.33.38.74.22 1.45.52 2.1.88.22.12.42.26.6.42.17.16.33.33.47.5.14.18.25.36.34.56.08.2.13.4.15.6.02.2-.01.4-.06.6a.71.71 0 0 1-.36.32c-.17.07-.36.09-.54.04-.18-.04-.35-.14-.5-.28-.15-.14-.26-.32-.33-.51-.1-.28-.15-.58-.13-.88 0-.02 0-.04.01-.06-.32.06-.63.14-.94.25-1 .38-1.95.84-2.88 1.39l-.04.03-.04.02-.04.02C4.19 11.23 2.6 11.75.9 11.89a10.6 10.6 0 0 1-.9-.05.58.58 0 0 1-.41-.43c-.09-.32 0-.64.24-.92.15-.17.33-.3.51-.38.2-.1.4-.15.6-.14.2.01.4.06.58.15l-.02-.02.48-.26c.29-.16.58-.33.88-.5.3-.17.6-.33.91-.49.26-.14.53-.28.79-.41.26-.13.52-.25.79-.37l.48-.25c.31-.16.63-.3.95-.44.25-.11.5-.22.76-.32C6.18 5.76 7.6 5 9.02 4.47l.48-.17c.33-.12.66-.23 1-.33.25-.08.5-.15.75-.2.25-.05.5-.08.75-.07.25.01.5.05.74.12.24.07.47.17.68.29.2.12.38.25.54.4.15.14.28.3.39.46.11.16.19.33.24.51.05.17.06.35.02.52a.85.85 0 0 1-.31.42c-.18.1-.38.16-.58.18-.2.02-.4-.01-.58-.08a10.4 10.4 0 0 0-.7-.27c-.36-.1-.73-.17-1.1-.2-.36-.03-.73-.01-1.1.06-.37.07-.73.2-1.08.38-.34.18-.68.4-.99.64-.3.25-.59.5-.85.76-.27.27-.51.55-.7.83-.2.28-.36.56-.47.83-.12.28-.18.56-.18.83 0 .05.01.1.02.15-.02-.02-.03-.03-.04-.05z"/></svg>', 
                    velocidadX: 1.2, velocidadY: 1.8 
                },
                { 
                    id: 'ficha-ig', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.752.014c-.82.004-1.458.11-2.004.336-.559.232-.97.585-1.342.957-.372.371-.725.783-.957 1.342-.226.546-.332 1.184-.336 2.004C.01 5.556 0 5.829 0 8s.01 2.444.014 3.248c.004.82.11 1.458.336 2.004.232.559.585.97 0 1.342.371.372.783.725 1.342.957.546.226 1.184.332 2.004.336C5.556 15.99 5.829 16 8 16s2.444-.01 3.248-.014c.82-.004 1.458-.11 2.004-.336.559-.232.97-.585 1.342-.957.372-.371.725-.783.957-1.342.226-.546.332-1.184.336-2.004C15.99 10.444 16 10.171 16 8s-.01-2.444-.014-3.248c-.004-.82-.11-1.458-.336-2.004-.232-.559-.585-.97-.957-1.342-.371-.372-.725-.783-1.342-.957-.546-.226-1.184-.332-2.004-.336C10.444.01 10.171 0 8 0zm0 1.592c2.185 0 2.444.01 3.25.014.777.004 1.247.118 1.48.215.206.093.398.22.54.36.141.14.267.332.35.534.093.207.205.648.213 1.48.004.816.014 1.07.014 3.241v.003c0 2.164-.01 2.43-.014 3.25-.004.777-.118 1.247-.215 1.48a2.502 2.502 0 0 1-.36.548c-.14.14-.332.267-.534.35-.207.093-.648.205-1.48.213-.816.004-1.07.014-3.24.014h-.003c-2.165 0-2.43-.01-3.25-.014-.777-.004-1.247-.118-1.48-.215a2.502 2.502 0 0 1-.548-.36c-.14-.14-.267-.332-.35-.534-.093-.207-.205-.648-.213-1.48-.004-.816-.014-1.07-.014-3.241v-.003c0-2.164.01-2.43.014-3.25.004-.777.118-1.247.215-1.48.093-.206.22-.398.36-.54.14-.141.332-.267.534-.35.207-.093.648-.205 1.48-.213.816-.004 1.07-.014 3.24-.014h.003zm0 1.637a6.40 6.40 0 1 1 0 12.8 6.40 6.40 0 0 1 0-12.8z"/><path d="M12.94 2.808a1.218 1.218 0 0 1 0 1.696 1.218 1.218 0 0 1-1.7-.001 1.218 1.218 0 0 1 0-1.696 1.218 1.218 0 0 1 1.7.001zM8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 1a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></svg>', 
                    velocidadX: 1.8, velocidadY: 0.8 
                },
                { 
                    id: 'ficha-li', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248s.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.867 0 1.213.66 1.213 1.616v3.092h2.4V9.237c0-2.278-1.135-3.831-3.285-3.831-1.54 0-2.2.888-2.521 1.751v-.001h-.002V6.169h-2.401v7.225h2.401z"/></svg>', 
                    velocidadX: 1.0, velocidadY: 1.5 
                },
                { 
                    id: 'ficha-git', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.6.11.82-.26.82-.57v-2.03c-2.2-.49-2.68-.99-2.68-.99-.36-.91-.83-1.15-.83-1.15-.26-.18-.65-.1-.01-.1.55.0 1.05.57 1.05.57.48.83 1.26.59 1.56.46.05-.36.19-.59.35-.71C5.52 10.04 3.15 9.19 3.15 5.98c0-.55.24-1 0-1.4.23-.55.23-1.4 0-1.4-.01-.01.21-.01.5.0.47.0 1.0.54 1.38.91.48-.5.58-.78 1.34-.78.09.0 1.8.0 2.0.01.22.0.42.02.6.02.2-.02.4-.02.6-.02.4-.0.93.0 1.4.78.38-.37.91-.91 1.38-.91.29.0.51.01.5.0.23.65.23 1.4.0 1.4.0.4.24.85.24 1.4.0 3.23-2.38 4.06-4.66 4.39.2.17.4.5.4.5V15c0 .31.22.68.83.58A8 8 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>',
                    velocidadX: 1.4, velocidadY: 1.2
                },
                { 
                    id: 'ficha-wifi', 
                    svg: '<svg xmlns="www.w3.org" width="100%" height="100%" fill="currentColor" class="bi bi-wifi" viewBox="0 0 16 16"><path d="M15.384 6.116a.5.5 0 0 0-.43-.418C13.812 5.093 12.012 4.6 10 4.6c-2.012 0-3.812.493-4.954 1.098a.5.5 0 0 0-.43.418.502.502 0 0 0 .158.46l.001.001.002.002a.5.5 0 0 0 .615-.176C6.31 5.64 7.202 5.4 8 5.4s1.69.239 2.511.69.57.1.615.175a.5.5 0 0 0 .158-.46zM12.51 8.91a.5.5 0 0 0-.457-.457C11.517 8.045 10.56 7.7 9.51 7.7c-.07 0-.13-.002-.19-.004a.5.5 0 0 0-.497.5l.003.04.004.053.006.076.009.11.01.127.016.2.02.25.028.328.035.417.042.503.047.587.05.654a.5.5 0 0 0 .59.45.502.502 0 0 0 .44-.523C11.666 9.8 12.008 9.36 12.51 8.91zM9 11.237a.5.5 0 0 0-.47-.492c-.067.002-.134.004-.2.004-.085 0-.17-.002-.255-.006a.5.5 0 0 0-.5.5c0 .085.002.17.006.255.004.085.006.169.006.252 0 .1-.002.2-.006.29a.5.5 0 0 0 .502.49.5.5 0 0 0 .468-.5.856.856 0 0 0-.006-.328.65.65 0 0 0-.006-.213zM6 13.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .5-.5z"/></svg>',
                    velocidadX: 1.1, velocidadY: 1.9
                }
            ];

            const fichasActivas = [];

            function crearFichas() {
                if (!contenedor) return;

                configuracionFichas.forEach(config => {
                    const fichaElemento = document.createElement('div');
                    fichaElemento.id = config.id;
                    fichaElemento.classList.add('ficha-3d');
                    
                    /* ESTRUCTURA HTML ACTUALIZADA CON TODAS LAS CARAS */
                    fichaElemento.innerHTML = `
                        <div class="cube-inner">
                            <div class="face front">${config.svg}</div>
                            <div class="face right"></div>
                            <div class="face left"></div>
                            <div class="face back">${config.svg}</div> 
                            <div class="face top"></div> 
                            <div class="face bottom"></div> 
                        </div>
                    `;
                    
                    contenedor.appendChild(fichaElemento);

                    const nuevaFicha = {
                        element: fichaElemento,
                        cubeInner: fichaElemento.querySelector('.cube-inner'),
                        // Posiciones iniciales aleatorias para que no se superpongan al inicio
                        posX: Math.random() * (contenedor.clientWidth - FICHA_SIZE),
                        posY: Math.random() * (contenedor.clientHeight - VISUAL_HEIGHT),
                        velocidadX: config.velocidadX,
                        velocidadY: config.velocidadY,
                        gradosX: 0, gradosY: 0, gradosZ: 0,
                        velRotX: (Math.random() * 1) + 0.5, 
                        velRotY: (Math.random() * 1) + 0.5,
                        velRotZ: (Math.random() > 0.5 ? 0.5 : -0.5)
                    };
                    
                    fichasActivas.push(nuevaFicha);
                    
                    fichaElemento.addEventListener('mouseenter', () => pausarFicha(nuevaFicha));
                    fichaElemento.addEventListener('mouseleave', () => reanudarFicha(nuevaFicha));
                });
            }

            function pausarFicha(ficha) {
                ficha.originalVelocidadX = ficha.velocidadX;
                ficha.originalVelocidadY = ficha.velocidadY;
                ficha.originalVelRotX = ficha.velRotX;
                ficha.originalVelRotY = ficha.velRotY;
                ficha.originalVelRotZ = ficha.velRotZ;

                ficha.velocidadX = 0;
                ficha.velocidadY = 0;
                ficha.velRotX = 0;
                ficha.velRotY = 0;
                ficha.velRotZ = 0;
            }

            function reanudarFicha(ficha) {
                ficha.velocidadX = ficha.originalVelocidadX;
                ficha.velocidadY = ficha.originalVelocidadY;
                ficha.velRotX = ficha.originalVelRotX;
                ficha.velRotY = ficha.originalVelRotY;
                ficha.velRotZ = ficha.originalVelRotZ;
            }
            
            function animarMovimiento() {
                const contenedorWidth = contenedor.clientWidth;
                const contenedorHeight = contenedor.clientHeight;
                const limiteX = contenedorWidth - FICHA_SIZE;
                const limiteY = contenedorHeight - VISUAL_HEIGHT; 

                fichasActivas.forEach(ficha => {
                    ficha.posX += ficha.velocidadX;
                    ficha.posY += ficha.velocidadY;
                    ficha.gradosX += ficha.velRotX;
                    ficha.gradosY += ficha.velRotY;
                    ficha.gradosZ += ficha.velRotZ;

                    if (ficha.posX >= limiteX || ficha.posX <= 0) {
                        ficha.velocidadX *= -1; 
                        ficha.velRotY *= -1;
                        ficha.velRotZ *= -1;
                        ficha.posX = Math.max(0, Math.min(ficha.posX, limiteX)); 
                    }

                    if (ficha.posY >= limiteY || ficha.posY <= 0) {
                        ficha.velocidadY *= -1; 
                        ficha.velRotX *= -1;
                        ficha.velRotZ *= -1;
                        ficha.posY = Math.max(0, Math.min(ficha.posY, limiteY)); 
                    }

                    ficha.element.style.transform = `translate(${ficha.posX}px, ${ficha.posY}px)`;
                    ficha.cubeInner.style.transform = 
                        `rotateX(${ficha.gradosX}deg) 
                         rotateY(${ficha.gradosY}deg) 
                         rotateZ(${ficha.gradosZ}deg)`;
                });

                requestAnimationFrame(animarMovimiento);
            }

            crearFichas();
            animarMovimiento();
        });