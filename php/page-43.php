<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HB
 */

get_header();
// global $post;

?>
        
    <section class="inner-wrapper legal-pages"> 
        <div class="container-fluid">
        <div class="page-title-wrapper">
            <h2 class="page-title">Confidentiality</h2>
            <p class="page-discription">This Confidentiality Agreement ("Agreement") is entered into as of [date] between [Your Company Name] ("Company") and any individual or entity ("Recipient") accessing or using the Company's online shopping website ("Website").</p>
        </div>
        <div  class="collapse-wrapper style-1">
            <div class="collapse-item active">
                <h4 class="collapse-title">
                    <span class="text">Purpose</span>
                    <span class="plusminus"></span>
                </h4>
                <div class="collapse-panel">
                    <div class="prod-discription">
                        <p>The purpose of this Agreement is to protect and maintain the confidentiality of any confidential information disclosed by the Company to the Recipient during the Recipient's access or use of the Company's Website.</p>
                    </div>
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Confidential Information<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <p>Confidential Information shall include, but is not limited to, any proprietary information, trade secrets, business strategies, financial data, customer lists, marketing plans, product information, and any other information disclosed by the Company to the Recipient, whether orally, in writing, or by any other means, and whether marked as confidential or not.</p>
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Obligations<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <ol>
                        <li><strong>Confidentiality: </strong>The Recipient agrees to keep all Confidential Information confidential and not to disclose, transfer, or use any Confidential Information for any purpose other than the intended use of the Company's Website.</li>
                        <li><strong>Protection: </strong>The Recipient agrees to take all reasonable measures to protect the Confidential Information from unauthorized access, use, or disclosure, including implementing appropriate security measures.</li>
                        <li><strong>Use Limitation: </strong>The Recipient agrees to use the Confidential Information solely for the purpose of accessing or using the Company's Website and not to use the Confidential Information for any other purpose without the prior written consent of the Company.</li>
                        <li><strong>Return or Destruction: </strong>Upon the Company's request or upon termination of this Agreement, the Recipient agrees to promptly return or destroy all Confidential Information in its possession and provide written certification of such return or destruction to the Company.</li>
                    </ul>
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Exceptions<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <p>Confidential Information shall not include any information that:</p> 
                    <ul>
                        <li>Is or becomes publicly known through no fault of the Recipient;</li>
                        <li>Is rightfully received by the Recipient from a third party without any obligation of confidentiality;</li>
                        <li>Is independently developed by the Recipient without reference to the Confidential Information; or</li>
                        <li>Is required to be disclosed by law, court order, or governmental regulation, provided that the Recipient provides prompt notice to the Company of such required disclosure.</li>
                    </ul>
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Term and Termination<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <p>This Agreement shall remain in effect for the duration of the Recipient's access or use of the Company's Website and shall survive any termination or expiration of such access or use.</p> 
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Governing Law<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <p>TThese terms and conditions shall be governed by and construed in accordance with the laws of England.</p> 
                </div>
            </div>
            <div class="collapse-item ">
                <h4 class="collapse-title">Acknowledgment<span class="plusminus"></span></h4>
                <div class="collapse-panel">
                    <p>The Recipient acknowledges that any breach of this Agreement may cause irreparable harm to the Company for which monetary damages would not be an adequate remedy. Accordingly, in addition to any other remedies available at law or in equity, the Company shall be entitled to seek injunctive relief to enforce the terms of this Agreement.</p> 
                    <p>By accessing or using the Company's Website, the Recipient agrees to be bound by the terms of this Agreement.</p>
                </div>
            </div>
        </div>
        </div>
    </section>

<?php
// get_sidebar();
get_footer();
