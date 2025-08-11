<style type="text/css">
    details{
        background-color: #409cff;
        color: #ffffff;
        font-size:14px;
        margin-bottom: .5em;
    }

    details:hover{
        background-color:rgb(201, 201, 201);
        color:rgb(0, 0, 0);
    }

    summary {
        padding: .5em 1.3rem;
        font-weight:bold;
        list-style: none;
        display: flex;
        justify-content: space-between;  
        transition: height 1s ease;
    }

    summary::-webkit-details-marker {
        display: none;
    }

    summary:after{
        content: "\2228";
    }

    details[open] summary {
        border-bottom: 1px solid #aaa;
    }

    details[open] summary:after{
        content: "\00D7";
    }

    details[open] div{
        background-color: #D2E4FC;
        color: #444;
        padding: .5em 1em;
    }
</style>

<div class="page-content">
    <section id="faq-pelaporan-gratifikasi" class="o-hidden" style="padding-top: 30px; padding-bottom: 30px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12" style="padding: 0px">
                <div class="section-title text-center mb-4">
                        <h2 class="title">FREQUENTLY ASKED QUESTIONS</h2> 
                    </div>
                    
                    @foreach ($items_faq as $item_faq)
                        <details>
                            <summary>{{ $item_faq->pgl_kategori }}</summary>
                            <div style="text-align: justify; text-justify: inter-word;">{!! $item_faq->pgl_nilai !!}</div>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>