import Breadcrumb from '@/Components/Breadcrumb'
import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import React from 'react'

const LegalPolicies = ({ page }) => {
    const { appName } = usePage().props
    const breadcrumb = [
        {
            title: 'Política de privacidad, cookies y condiciones generales'
        },
    ]
    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>
            <Breadcrumb data={breadcrumb} />
            <section className='py-section'>
                <div className='container space-y-10 text-lg '>
                    <div className='space-y-4'>
                        <h4>1. INFORMACIÓN LEGAL Y ACEPTACIÓN</h4>
                        <p>
                            El presente aviso legal recoge las condiciones generales que rigen el acceso y el uso de este sitio web, en adelante “el sitio web”.  El uso del sitio web implica la expresa y plena aceptación de estas condiciones generales en la versión publicada en el momento en que el usuario acceda al mismo, sin perjuicio de las condiciones particulares que pudieran aplicarse a algunos de los servicios concretos del sitio web.
                        </p>

                        <p>
                            El acceso a la página web es gratuito salvo en lo relativo al coste de la conexión a través de la red de telecomunicaciones suministrada por el proveedor de acceso contratado por los usuarios. Determinados servicios son exclusivos para nuestros clientes y su acceso se encuentra restringido.
                        </p>

                        <p>
                            La utilización del Portal atribuye la condición de usuario del Portal (en adelante, el 'Usuario') e implica la aceptación de todas las condiciones incluidas en este Aviso Legal. La prestación del servicio del Portal tiene una duración limitada al momento en el que el Usuario se encuentre conectado al Portal o a alguno de los servicios que a través del mismo se facilitan. Por tanto, el Usuario debe leer atentamente el presente Aviso Legal en cada una de las ocasiones en que se proponga utilizar el Portal, ya que éste y sus condiciones de uso recogidas en el presente Aviso Legal pueden sufrir modificaciones.
                        </p>

                        <p>
                            Algunos servicios del Portal accesibles para los usuarios de Internet o exclusivos para los clientes de {appName}, pueden estar sometidos a condiciones particulares, reglamentos e instrucciones que, en su caso, sustituyen, completan y/o modifican el presente Aviso Legal y que deberán ser aceptadas por el Usuario antes de iniciarse la prestación del servicio correspondiente.
                        </p>
                    </div>


                    <div className='space-y-4'>
                        <h4>2. PROPIEDAD INTELECTUAL E INDUSTRIAL</h4>

                        <p>
                            Este sitio web y los contenidos que alberga se encuentran protegidos por la legislación vigente en materia de propiedad intelectual.
                        </p>

                        <p>
                            {appName} es titular o licenciatario de todos los derechos de propiedad intelectual e industrial de su web, así como de los elementos contenidos en la misma. Por ello, queda expresamente prohibida la reproducción, distribución, comunicación pública y transformación de la totalidad o parte de los contenidos de esta web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de Términos y Condiciones.
                        </p>

                        <p>
                            Las marcas, nombres comerciales o signos distintivos son titularidad de {appName} o terceros, sin que pueda entenderse que el acceso al Portal atribuya ningún derecho sobre las citadas marcas, nombres comerciales y/o signos distintivos.
                        </p>

                        <p>
                            Las marcas, nombres comerciales o signos distintivos son titularidad de {appName} o terceros, sin que pueda entenderse que el acceso al Portal atribuya ningún derecho sobre las citadas marcas, nombres comerciales y/o signos distintivos.
                        </p>
                    </div>

                    <div className='space-y-4'>
                        <h4>3.CONDICIONES DE USO DEL PORTAL</h4>


                        <p>
                            El Usuario se obliga a hacer un uso correcto del Portal de conformidad con la Ley y el presente Aviso Legal. El Usuario responderá frente a {appName} o frente a terceros, de cualesquiera daños y perjuicios que pudieran causarse como consecuencia del incumplimiento de dicha obligación.
                        </p>

                        <p>
                            Queda expresamente prohibido el uso del Portal con fines lesivos de bienes o intereses de {appName} o de terceros o que de cualquier otra forma sobrecarguen, dañen o inutilicen las redes, servidores y demás equipos informáticos (hardware) o productos y aplicaciones informáticas (software) de {appName} o de terceros.
                        </p>

                        <p>
                            El Usuario se compromete a utilizar los Contenidos de conformidad con la Ley y el presente Aviso Legal, así como con las demás condiciones, reglamentos e instrucciones que en su caso pudieran ser de aplicación de conformidad con lo dispuesto en la cláusula 1.&nbsp;
                        </p>

                        <p>
                            Con carácter meramente enunciativo, el Usuario de acuerdo con la legislación vigente deberá abstenerse de:
                        </p>
                    </div>

                    <div className='space-y-4'>
                        <h4>4. EXCLUSIÓN DE RESPONSABILIDAD</h4>

                        <p>
                            El acceso al Portal no implica la obligación por parte de {appName} de comprobar la veracidad, exactitud, adecuación, idoneidad, exhaustividad y actualidad de la información suministrada a través del mismo. Los contenidos de esta página son de carácter general y no constituyen, en modo alguno, la prestación de un servicio de asesoramiento legal o de ningún tipo, por lo que dicha información resulta insuficiente para la toma de decisiones personales o empresariales por parte del Usuario.
                        </p>

                        <p>
                            El acceso al Portal no implica la obligación por parte de {appName} de controlar la ausencia de virus, gusanos o cualquier otro elemento informático dañino. Corresponde al Usuario, en todo caso, la disponibilidad de herramientas adecuadas para la detección y desinfección de programas informáticos dañinos.
                        </p>
                    </div>
                </div>
            </section>
        </Layout >
    )
}

export default LegalPolicies
