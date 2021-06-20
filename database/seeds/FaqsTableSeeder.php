<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'question' => '¿Qué es FILEX?',
            'answer' => '<p>FILEX es una plataforma para firmar tus documentos legales con firma electrónica, de forma sencilla y con validez legal.</p>
            <p>Los documentos firmados con FILEX tienen validez legal en México y pueden llegar a tener validez legal en otros países, sujeto a las disposiciones aplicables en dichas jurisdicciones.</p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Qué tipo de servicios de firmas ofrece FILEX?',
            'answer' => '<p>FILEX ofrece los siguientes servicios de firma electrónica de documentos, a través de: </p>
            <ul>
                <li style="list-style:unset">Firma Electrónica.</li>
                <li style="list-style:unset">E-Firma (antes Firma Electrónica Avanzada) (próximamente).</li>
            </ul>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Cuál es la diferencia entre los diferentes tipos de firma electrónica?',
            'answer' => '<p>Principalmente, la diferencia se puede identificar en el propósito para el que serán utilizadas y/o el fundamento de las mismas.</p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Cuál es el propósito y fundamento de la Firma Digital?',
            'answer' => '<p>La Firma Digital se utiliza principalmente para documentos sin mayor importancia legal, ya que este tipo de firma no se encuentra regulada en las leyes mexicanas y tampoco tiene validez legal alguna.</p>
            <p>La Firma Digital incluye:</p>
            <ul>
                <li style="list-style:unset">Pegar una imagen (e.g., jpg) de una firma en un documento.</li>
                <li style="list-style:unset">Firmar un documento con una pluma digital en tu tableta o computadora.</li>
                <li style="list-style:unset">Entre otras actividades similares.</li>
            </ul>
            <p>La Firma Digital se utiliza principalmente en comunicados, comprobantes de pago y comunicaciones entre las partes, de menor importancia legal.</p>
            <p>Por las razones expuestas, FILEX no ofrece el servicio de Firma Digital.</p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Cuál es el propósito y fundamento de la Firma Electrónica?',
            'answer' => '<p>La Firma Electrónica se utiliza para la firma general de documentos legales (e.g., contratos, certificaciones, etc.), salvo aquellos documentos que conforme a las leyes aplicables deban revestir una forma establecida por la ley (e.g., documentos que deben de constar en escritura pública o documentos que la ley exige necesariamente la firma autógrafa, como lo es el caso del pagaré).</p>
            <p>El fundamento de la Firma Electrónica se encuentra en el Código Civil Federal (aplicado supletoriamente al Código de Comercio) y en el Código de Comercio, tal como se muestra a continuación, de forma enunciativa, mas no limitativa:</p>
            <p><b>I.- CÓDIGO CIVIL FEDERAL (APLICADO SUPLETORIAMENTE EL CÓDIGO DE COMERCIO).</b></p>
            <p><b>Artículo 1794.-</b> <u>Para la existencia del contrato se requiere: I. Consentimiento</u>; II. Objeto que pueda ser materia del contrato.</p>
            <p><b>Artículo 1796.-</b> <u>Los contratos se perfeccionan por el mero consentimiento, excepto aquellos que deben revestir una forma establecida por la ley</u>. Desde que se perfeccionan obligan a los contratantes, no sólo al cumplimiento de lo expresamente pactado, sino también a las consecuencias que, según su naturaleza, son conforme a la buena fe, al uso o a la ley.</p>
            <p><b>Artículo 1803.-</b> <u>El consentimiento puede ser expreso o tácito</u>, para ello se estará a lo siguiente: I.- Será expreso cuando la voluntad se manifiesta verbalmente, por escrito, por medios electrónicos, ópticos o por cualquier otra tecnología, o por signos inequívocos, y II.- El tácito resultará de hechos o de actos que lo presupongan o que autoricen a presumirlo, excepto en los casos en que por ley o por convenio la voluntad deba manifestarse expresamente.</p>
            <p><b>Artículo 1805.-</b> Cuando la oferta se haga a una persona presente, sin fijación de plazo para aceptarla, el autor de la oferta queda desligado si la aceptación no se hace inmediatamente. <u>La misma regla se aplicará a la oferta hecha por teléfono o a través de cualquier otro medio electrónico, óptico o de cualquier otra tecnología que permita la expresión de la oferta y la aceptación de ésta en forma inmediata</u>.</p>
            <p><b>Artículo 1807.-</b> <u>El contrato se forma en el momento en que el proponente reciba la aceptación, estando ligado por su oferta, según los artículos precedentes</u>.</p>
            <p><b>II.- CÓDIGO DE COMERCIO.</b></p>
            <p><b>Artículo 89.-</b>  Las disposiciones de este Título regirán en toda la República Mexicana en asuntos del orden comercial, sin perjuicio de lo dispuesto en los tratados internacionales de los que México sea parte.</p>
            <p><u>Las actividades reguladas por este Título se someterán en su interpretación y aplicación a los principios de neutralidad tecnológica</u>, autonomía de la voluntad, compatibilidad internacional y equivalencia funcional del Mensaje de Datos en relación con la información documentada en medios no electrónicos y de la Firma Electrónica en relación con la firma autógrafa.</p>
            <p><u>En los actos de comercio y en la formación de los mismos podrán emplearse los medios electrónicos</u>, ópticos o cualquier otra tecnología. Para efecto del presente Código, se deberán tomar en cuenta las siguientes definiciones:</p>
            <p><b>Certificado</b>: Todo Mensaje de Datos u otro registro que confirme el vínculo entre un Firmante y los datos de creación de Firma Electrónica.</p>
            <p><b>Datos de Creación de Firma Electrónica</b>: Son los datos únicos, como códigos o claves criptográficas privadas, que el Firmante genera de manera secreta y utiliza para crear su Firma Electrónica, a fin de lograr el vínculo entre dicha Firma Electrónica y el Firmante. </p>
            <p><b>Destinatario</b>: La persona designada por el Emisor para recibir el Mensaje de Datos, pero que no esté actuando a título de Intermediario con respecto a dicho Mensaje. </p>
            <p><b>Digitalización</b>: Migración de documentos impresos a mensaje de datos, de acuerdo con lo dispuesto en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
            <p><b>Emisor</b>: Toda persona que, al tenor del Mensaje de Datos, haya actuado a nombre propio o en cuyo nombre se haya enviado o generado ese mensaje antes de ser archivado, si éste es el caso, pero que no haya actuado a título de Intermediario. </p>
            <p><b>Firma Electrónica</b>: <u>Los datos en forma electrónica consignados en un Mensaje de Datos, o adjuntados o lógicamente asociados al mismo por cualquier tecnología, que son utilizados para identificar al Firmante en relación con el Mensaje de Datos e indicar que el Firmante aprueba la información contenida en el Mensaje de Datos, y que produce los mismos efectos jurídicos que la firma autógrafa, siendo admisible como prueba en juicio</u>. </p>
            <p><b>Firma Electrónica Avanzada o Fiable</b>: <u>Aquella Firma Electrónica que cumpla con los requisitos contemplados en las fracciones I a IV del artículo 97</u>. En aquellas disposiciones que se refieran a Firma Digital, se considerará a ésta como una especie de la Firma Electrónica. Firmante: La persona que posee los datos de la creación de la firma y que actúa en nombre propio o de la persona a la que representa. </p>
            <p><b>Intermediario</b>: En relación con un determinado Mensaje de Datos, se entenderá toda persona que, actuando por cuenta de otra, envíe, reciba o archive dicho Mensaje o preste algún otro servicio con respecto a él. </p>
            <p><b>Mensaje de Datos</b>: La información generada, enviada, recibida o archivada por medios electrónicos, ópticos o cualquier otra tecnología. Parte que Confía: La persona que, siendo o no el Destinatario, actúa sobre la base de un Certificado o de una Firma Electrónica. </p>
            <p><b>Prestador de Servicios de Certificación</b>: La persona o institución pública que preste servicios relacionados con firmas electrónicas, expide los certificados o presta servicios relacionados como la conservación de mensajes de datos, el sellado digital de tiempo y la digitalización de documentos impresos, en los términos que se establezca en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
            <p><b>Secretaría</b>: Se entenderá la Secretaría de Economía. </p>
            <p><b>Sello Digital de Tiempo</b>: El registro que prueba que un dato existía antes de la fecha y hora de emisión del citado Sello, en los términos que se establezca en la norma oficial mexicana sobre digitalización y conservación de mensajes de datos que para tal efecto emita la Secretaría.</p>
            <p><b>Sistema de Información</b>: Se entenderá todo sistema utilizado para generar, enviar, recibir, archivar o procesar de alguna otra forma Mensajes de Datos. </p>
            <p><b>Titular del Certificado</b>: Se entenderá a la persona a cuyo favor fue expedido el Certificado.</p>
            <p><b>Artículo 89 bis.-</b> <u>No se negarán efectos jurídicos, validez o fuerza obligatoria a cualquier tipo de información por la sola razón de que esté contenida en un Mensaje de Datos</u>. Por tanto, dichos mensajes podrán ser utilizados como medio probatorio en cualquier diligencia ante autoridad legalmente reconocida, y surtirán los mismos efectos jurídicos que la documentación impresa, siempre y cuando los mensajes de datos se ajusten a las disposiciones de este Código y a los lineamientos normativos correspondientes.</p>
            <p><b>Artículo 90.-</b> Se presumirá que un Mensaje de Datos proviene del Emisor si ha sido enviado: I. Por el propio Emisor; II. Usando medios de identificación, tales como claves o contraseñas del Emisor o por alguna persona facultada para actuar en nombre del Emisor respecto a ese Mensaje de Datos, o III. Por un Sistema de Información programado por el Emisor o en su nombre para que opere automáticamente</p>
            <p>I. Haya aplicado en forma adecuada el procedimiento acordado previamente con el Emisor, con el fin de establecer que el Mensaje de Datos provenía efectivamente de éste, o II. El Mensaje de Datos que reciba el Destinatario o la Parte que Confía, resulte de los actos de un Intermediario que le haya dado acceso a algún método utilizado por el Emisor para identificar un Mensaje de Datos como propio.</p>
            <p>…</p>
            <p><b>Artículo 93.-</b> <u>Cuando la ley exija la forma escrita para los actos, convenios o contratos, este supuesto se tendrá por cumplido tratándose de Mensaje de Datos, siempre que la información en él contenida se mantenga íntegra y sea accesible para su ulterior consulta, sin importar el formato en el que se encuentre o represente</u>. Cuando adicionalmente la ley exija la firma de las partes, dicho requisito se tendrá por cumplido tratándose de Mensaje de Datos, siempre que éste sea atribuible a dichas partes.</p>
            <p>En los casos en que la ley establezca como requisito que un acto jurídico deba otorgarse en instrumento ante fedatario público, éste y las partes obligadas podrán, a través de Mensajes de Datos, expresar los términos exactos en que las partes han decidido obligarse, en cuyo caso el fedatario público deberá hacer constar en el propio instrumento los elementos a través de los cuales se atribuyen dichos mensajes a las partes y conservar bajo su resguardo una versión íntegra de los mismos para su ulterior consulta, otorgando dicho instrumento de conformidad con la legislación aplicable que lo rige.</p>
            <p><b>Artículo 93 bis.-</b> Sin perjuicio de lo dispuesto en el artículo 49 de este Código, cuando la ley requiera que la información sea presentada y conservada en su forma original, ese requisito quedará satisfecho respecto a un Mensaje de Datos: I. Si existe garantía confiable de que se ha conservado la integridad de la información, a partir del momento en que se generó por primera vez en su forma definitiva, como Mensaje de Datos o en alguna otra forma, y II. De requerirse que la información sea presentada, si dicha información puede ser mostrada a la persona a la que se deba presentar.</p>
            <p>Para efectos de este artículo, se considerará que el contenido de un Mensaje de Datos es íntegro, si éste ha permanecido completo e inalterado independientemente de los cambios que hubiere podido sufrir el medio que lo contiene, resultado del proceso de comunicación, archivo o presentación. El grado de confiabilidad requerido será determinado conforme a los fines para los que se generó la información y de todas las circunstancias relevantes del caso.</p>
            <p><b>Artículo 95 bis 2.-</b> En materia de conservación de mensajes de datos, será responsabilidad estricta del comerciante mantenerlos bajo su control, acceso y resguardo directo, a fin de que su ulterior consulta pueda llevarse a cabo en cualquier momento.</p>
            <p><b>Artículo 96.-</b> Las disposiciones del presente Código serán aplicadas de modo que no excluyan, restrinjan o priven de efecto jurídico cualquier método para crear una Firma Electrónica.</p>
            <p><b>Artículo 97.-</b> Cuando la ley requiera o las partes acuerden la existencia de una Firma en relación con un Mensaje de Datos, se entenderá satisfecho dicho requerimiento si se utiliza una Firma Electrónica que resulte apropiada para los fines para los cuales se generó o comunicó ese Mensaje de Datos.</p>
            <p>La Firma Electrónica se considerará Avanzada o Fiable si cumple por lo menos los siguientes requisitos: I. Los Datos de Creación de la Firma, en el contexto en que son utilizados, corresponden exclusivamente al Firmante; II. Los Datos de Creación de la Firma estaban, en el momento de la firma, bajo el control exclusivo del Firmante; III. Es posible detectar cualquier alteración de la Firma Electrónica hecha después del momento de la firma; y IV. Respecto a la integridad de la información de un Mensaje de Datos, es posible detectar cualquier alteración de ésta hecha después del momento de la firma. </p>
            <p>Lo dispuesto en el presente artículo se entenderá sin perjuicio de la posibilidad de que cualquier persona demuestre de cualquier otra manera la fiabilidad de una Firma Electrónica; o presente pruebas de que una Firma Electrónica no es fiable.</p>
            <p><b>Artículo 98.-</b> Los Prestadores de Servicios de Certificación determinarán y harán del conocimiento de los usuarios si las Firmas Electrónicas Avanzadas o Fiables que les ofrecen cumplen o no los requerimientos dispuestos en las fracciones I a IV del artículo 97. </p>
            <p>La determinación que se haga, con arreglo al párrafo anterior, deberá ser compatible con las normas y criterios internacionales reconocidos.</p>
            <p><em>Entre otros.</em></p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Cuál es el propósito y fundamento de la E-Firma (antes Firma Electrónica Avanzada)?',
            'answer' => '<p>La E-Firma (antes Firma Electrónica Avanzada) se utiliza principalmente para el cumplimiento de obligaciones fiscales; sin embargo, por su estructuración, puede ser utilizada también para el mismo propósito que la Firma Electrónica y con sus mismas limitantes (ver pregunta y respuesta 5).</p>
            <p>El fundamento de la E-Firma (antes Firma Electrónica Avanzada) se encuentra en el Código Fiscal de la Federación, la Ley de Firma Electrónica Avanzada, la Resolución Miscelánea Fiscal vigente, Regla 2.2.15 <em>"Requisitos para la solicitud de generación o renovación del certificado de E.firma”</em> y el Anexo 1-A de la Resolución Miscelánea Fiscal vigente, fichas de trámites 105/CFF <em>"Solicitud de generación del Certificado de e.firma"</em> y 197/CFF <em>"Aclaración en las solicitudes de trámites de Contraseña o Certificado de E.firma"</em>, tal como se muestra a continuación, de forma enunciativa, mas no limitativa:</p>
            <p><b>CÓDIGO FISCAL DE LA FEDERACIÓN</b>.</p>
            <p><b>Artículo 17-D.-</b> <u>Cuando las disposiciones fiscales obliguen a presentar documentos, éstos deberán ser digitales y contener una firma electrónica avanzada del autor, salvo los casos que establezcan una regla diferente</u>. Las autoridades fiscales, mediante reglas de carácter general, podrán autorizar el uso de otras firmas electrónicas. Para los efectos mencionados en el párrafo anterior, se deberá contar con un certificado que confirme el vínculo entre un firmante y los datos de creación de una firma electrónica avanzada, expedido por el Servicio de Administración Tributaria cuando se trate de personas morales y de los sellos digitales previstos en el artículo 29 de este Código, y por un prestador de servicios de certificación autorizado por el Banco de México cuando se trate de personas físicas. El Banco de México publicará en el Diario Oficial de la Federación la denominación de los prestadores de los servicios mencionados que autorice y, en su caso, la revocación correspondiente. En los documentos digitales, una firma electrónica avanzada amparada por un certificado vigente sustituirá a la firma autógrafa del firmante, garantizará la integridad del documento y producirá los mismos efectos que las leyes otorgan a los documentos con firma autógrafa, teniendo el mismo valor probatorio. Se entiende por documento digital todo mensaje de datos que contiene información o escritura generada, enviada, recibida o archivada por medios electrónicos, ópticos o de cualquier otra tecnología.</p>77'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Tiene que tener mi documento legal alguna leyenda para que pueda ser firmado por Firma Electrónica?',
            'answer' => '<p>Aunque las leyes aplicables explícitamente no lo requieren, se recomienda incluir el siguiente texto en los documentos que serán firmados de este modo: <br></p>
            <p><em>“Las partes acuerdan que el presente instrumento podrá ser firmado a través de las correspondientes firmas autógrafas y/o firmas electrónicas, indistintamente, las cuales aceptan y ratifican en este acto, para todos los efectos legales correspondientes.”</em></p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿La información de mi documento es confidencial?',
            'answer' => '<p>Sí, toda la información firmada y almacenada en FILEX es confidencial, lo que significa que nuestro equipo legal y nuestro equipo tecnológico <u>no</u> tienen acceso a dicha información.</p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Están protegidos mis datos personales, así como información bancaria?',
            'answer' => '<p>Sí, los datos personales se encuentran protegidos de conformidad Ley Federal de Protección de Datos Personales en Posesión de los Particulares y el Reglamento de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>
            <p>Los datos bancarios se encuentran protegidos a través de [*].</p>'
        ]);
        DB::table('faqs')->insert([
            'question' => '¿Cómo puedo contactar al equipo legal y/o tecnológico de FILEX?',
            'answer' => '<p>Para cualquier duda o comentario, favor de comunicarte al correo: <a href="mailto:"> informacion@filex.com.mx </a></p>'
        ]);
    }
}
