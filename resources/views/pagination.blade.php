
@if ($paginator->hasPages())
    <div class="footer-pagination">
        <div class="container-fluid pd-bottom-lv4 pd-top-lv3 mg-top-lv1">
            <div class="row row--horizontal-center row--vertical-center mg-none">
                <div class="pagination">
                    <div class="pagination__button clearfix mb-7">
                        @if ($paginator->onFirstPage())
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-bg-secondary rounded-full mr-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="lni lni-arrow-left fs-2"></i>
                                <span>{{App\Helpers\Smt::translate('Sebelumnya',app()->getLocale())}}</span>
                            </a>
                        @endif

                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="btn primary-btn rounded-full ml-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span>{{App\Helpers\Smt::translate('Selanjutnya',app()->getLocale())}}</span>
                                <i class="lni lni-arrow-right fs-2"></i>
                            </a>
                        @else
                        @endif
                    </div>
                </div>

                <div class="pagination pagination__menu pagination__menu--xs hide-tablet noscript">
                    <div class="pagination__context hide-mobile mr-2">
                        <span>{{App\Helpers\Smt::translate('Page',app()->getLocale())}}</span>
                    </div>
                    <form onsubmit="document.location.href = {{ $paginator->url(0) }}; return false;" method="GET">
                        <div class="input-items default mr-2">
                            <input style="width: 50px" type="text" name="page" min="0" max="{{ $paginator->lastPage() }}" value="{{ $paginator->currentPage() }}" placeholder="Page #"/>
                        </div>
                    </form>
                    <div class="pagination__context hide-phone ml-2">
                        <span>{{App\Helpers\Smt::translate('of',app()->getLocale())}}</span>
                        <span class="pagination__pages">{{ $paginator->lastPage() }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif


