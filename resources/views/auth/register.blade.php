@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
        <div class="content">
            <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign Up Block -->
                    <div class="block block-rounded mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create Account</h3>
                            <div class="block-options">
                                <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#one-signup-terms">View Terms</a>
                                <a class="btn-block-option" href="{{ route('login') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Sign In">
                                    <i class="fa fa-sign-in-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                <h1 class="h2 mb-4"><img src="{{ asset('media/logos/Full-Logo-Black.png') }}"
                                        class="img-fluid" alt=""></h1>
                                <p class="fw-medium text-muted">
                                    Please fill the following details to create a new account.
                                </p>

                                <!-- Sign Up Form -->
                                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->

                                <form method="POST" class="js-validation-signup" action="{{ route('register') }}">
                                    @csrf
                                    <div class="py-3">
                                        <div class="mb-4">
                                            <input type="text"
                                                class="form-control form-control-lg form-control-alt @error('first_name') is-invalid @enderror"
                                                id="signup-username" value="{{ old('first_name') }}" required
                                                autocomplete="first_name" autofocus name="first_name"
                                                placeholder="First Name">

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="text"
                                                class="form-control form-control-lg form-control-alt @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                                                name="last_name" placeholder="Last Name">

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-4">
                                            <input id="phone" type="number"
                                                class="form-control form-control-lg form-control-alt @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                autofocus placeholder="Phone">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-4">


                                            <input id="password" type="password"
                                                class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <div class="mb-4">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-lg form-control-alt"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password">

                                        </div>
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" required type="checkbox" value=""
                                                    id="signup-terms" name="signup-terms">
                                                <label class="form-check-label" for="signup-terms">I agree to Terms &amp;
                                                    Conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn w-100 btn-alt-success">
                                                <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Sign Up
                                            </button>
                                        </div>

                                        <div class="mt-4">

                                            <a href="{{ route('login') }}">Already a member? Sign in</a>

                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign Up Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign Up Block -->
                </div>
            </div>
            <div class="fs-sm text-muted text-center">
                <strong>Valiant Grading Advantage, LLC All Rights Reserved </strong> &copy; <span
                    data-toggle="year-copy"></span>
            </div>
        </div>

        <!-- Terms Modal -->
        <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">

                            <div>
                                <h3>Agreement between User and www.valiantgrading.com</h3>
                                <p>
                                    Welcome to www.valiantgrading.com. The www.valiantgrading.com website (the "Site") is
                                    comprised of various web pages operated by Valiant Grading Advantage ("VGA").
                                    www.valiantgrading.com is offered to you conditioned on your acceptance without
                                    modification of the terms, conditions, and notices contained herein (the "Terms"). Your
                                    use of www.valiantgrading.com constitutes your agreement to all such Terms. Please read
                                    these terms carefully, and keep a copy of them for your reference.
                                </p>

                                <a target="_blank" href="www.valiantgrading.com">www.valiantgrading.com is an E-Commerce
                                    Site</a>



                                <p>Trading Card Grading, Authenticating and Encapsulation
                                </p>
                            </div>


                            <div>
                                <h3>Privacy</h3>

                                <p>
                                    Your use of www.valiantgrading.com is subject to VGA's Privacy Policy. Please review our
                                    Privacy Policy, which also governs the Site and informs users of our data collection
                                    practices.

                                </p>

                            </div>
                            <br>

                            <div>
                                <h3>Electronic Communications</h3>
                                <p>
                                    Visiting www.valiantgrading.com or sending emails to VGA constitutes electronic
                                    communications. You consent to receive electronic communications and you agree that all
                                    agreements, notices, disclosures and other communications that we provide to you
                                    electronically, via email and on the Site, satisfy any legal requirement that such
                                    communications be in writing.

                                </p>
                            </div>

                            <div>
                                <h3>Your Account</h3>
                                <p>
                                    If you use this site, you are responsible for maintaining the confidentiality of your
                                    account and password and for restricting access to your computer, and you agree to
                                    accept responsibility for all activities that occur under your account or password. You
                                    may not assign or otherwise transfer your account to any other person or entity. You
                                    acknowledge that VGA is not responsible for third party access to your account that
                                    results from theft or misappropriation of your account. VGA and its associates reserve
                                    the right to refuse or cancel service, terminate accounts, or remove or edit content in
                                    our sole discretion.
                                </p>
                            </div>

                            <div>
                                <h3>Children Under Thirteen</h3>
                                <p>
                                    VGA does not knowingly collect, either online or offline, personal information from
                                    persons under the age of thirteen. If you are under 18, you may use
                                    www.valiantgrading.com only with permission of a parent or guardian.

                                </p>
                            </div>

                            <div>
                                <h3>Links to Third Party Sites/Third Party Services</h3>
                                <p>
                                    <a href="www.valiantgrading.com" target="_blank">www.valiantgrading.com</a> may contain
                                    links to other websites ("Linked Sites"). The Linked Sites are not under the control of
                                    VGA and VGA is not responsible for the contents of any Linked Site, including without
                                    limitation any link contained in a Linked Site, or any changes or updates to a Linked
                                    Site. VGA is providing these links to you only as a convenience, and the inclusion of
                                    any link does not imply endorsement by VGA of the site or any association with its
                                    operators.
                                </p>
                                <p>
                                    Certain services made available via www.valiantgrading.com are delivered by third party
                                    sites and organizations. By using any product, service or functionality originating from
                                    the www.valiantgrading.com domain, you hereby acknowledge and consent that VGA may share
                                    such information and data with any third party with whom VGA has a contractual
                                    relationship to provide the requested product, service or functionality on behalf of
                                    www.valiantgrading.com users and customers.

                                </p>
                            </div>

                            <div>
                                <h3>No Unlawful or Prohibited Use/Intellectual Property</h3>
                                <p>
                                    You are granted a non-exclusive, non-transferable, revocable license to access and use
                                    www.valiantgrading.com strictly in accordance with these terms of use. As a condition of
                                    your use of the Site, you warrant to VGA that you will not use the Site for any purpose
                                    that is unlawful or prohibited by these Terms. You may not use the Site in any manner
                                    which could damage, disable, overburden, or impair the Site or interfere with any other
                                    party's use and enjoyment of the Site. You may not obtain or attempt to obtain any
                                    materials or information through any means not intentionally made available or provided
                                    for through the Site.

                                </p>

                                <p>
                                    All content included as part of the Service, such as text, graphics, logos, images, as
                                    well as the compilation thereof, and any software used on the Site, is the property of
                                    VGA or its suppliers and protected by copyright and other laws that protect intellectual
                                    property and proprietary rights. You agree to observe and abide by all copyright and
                                    other proprietary notices, legends or other restrictions contained in any such content
                                    and will not make any changes thereto.

                                </p>

                                <p>
                                    You will not modify, publish, transmit, reverse engineer, participate in the transfer or
                                    sale, create derivative works, or in any way exploit any of the content, in whole or in
                                    part, found on the Site. VGA content is not for resale. Your use of the Site does not
                                    entitle you to make any unauthorized use of any protected content, and in particular you
                                    will not delete or alter any proprietary rights or attribution notices in any content.
                                    You will use protected content solely for your personal use, and will make no other use
                                    of the content without the express written permission of VGA and the copyright owner.
                                    You agree that you do not acquire any ownership rights in any protected content. We do
                                    not grant you any licenses, express or implied, to the intellectual property of VGA or
                                    our licensors except as expressly authorized by these Terms.
                                </p>
                            </div>

                            <div>
                                <h3>International Users</h3>
                                <p>
                                    The Service is controlled, operated and administered by VGA from our offices within the
                                    USA. If you access the Service from a location outside the USA, you are responsible for
                                    compliance with all local laws. You agree that you will not use the VGA Content accessed
                                    through <a href="www.valiantgrading.com" target="_blank">www.valiantgrading.com</a> in
                                    any country or in any manner prohibited by any
                                    applicable laws, restrictions or regulations.

                                </p>
                            </div>

                            <div>
                                <h3>Indemnification</h3>
                                <p>
                                    You agree to indemnify, defend and hold harmless VGA, its officers, directors,
                                    employees, agents and third parties, for any losses, costs, liabilities and expenses
                                    (including reasonable attorney's fees) relating to or arising out of your use of or
                                    inability to use the Site or services, any user postings made by you, your violation of
                                    any terms of this Agreement or your violation of any rights of a third party, or your
                                    violation of any applicable laws, rules or regulations. VGA reserves the right, at its
                                    own cost, to assume the exclusive defense and control of any matter otherwise subject to
                                    indemnification by you, in which event you will fully cooperate with VGA in asserting
                                    any available defenses.
                                </p>
                            </div>

                            <div>
                                <h3>Liability Disclaimer</h3>
                                <p>
                                    THE INFORMATION, SOFTWARE, PRODUCTS, AND SERVICES INCLUDED IN OR AVAILABLE THROUGH THE
                                    SITE MAY INCLUDE INACCURACIES OR TYPOGRAPHICAL ERRORS. CHANGES ARE PERIODICALLY ADDED TO
                                    THE INFORMATION HEREIN. VALIANT GRADING ADVANTAGE AND/OR ITS SUPPLIERS MAY MAKE
                                    IMPROVEMENTS AND/OR CHANGES IN THE SITE AT ANY TIME.

                                </p>
                                <p>
                                    VALIANT GRADING ADVANTAGE AND/OR ITS SUPPLIERS MAKE NO REPRESENTATIONS ABOUT THE
                                    SUITABILITY, RELIABILITY, AVAILABILITY, TIMELINESS, AND ACCURACY OF THE INFORMATION,
                                    SOFTWARE, PRODUCTS, SERVICES AND RELATED GRAPHICS CONTAINED ON THE SITE FOR ANY PURPOSE.
                                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, ALL SUCH INFORMATION, SOFTWARE,
                                    PRODUCTS, SERVICES AND RELATED GRAPHICS ARE PROVIDED "AS IS" WITHOUT WARRANTY OR
                                    CONDITION OF ANY KIND. VALIANT GRADING ADVANTAGE AND/OR ITS SUPPLIERS HEREBY DISCLAIM
                                    ALL WARRANTIES AND CONDITIONS WITH REGARD TO THIS INFORMATION, SOFTWARE, PRODUCTS,
                                    SERVICES AND RELATED GRAPHICS, INCLUDING ALL IMPLIED WARRANTIES OR CONDITIONS OF
                                    MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT.
                                </p>
                                <p>
                                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT SHALL VALIANT GRADING
                                    ADVANTAGE AND/OR ITS SUPPLIERS BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, INCIDENTAL,
                                    SPECIAL, CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER INCLUDING, WITHOUT LIMITATION,
                                    DAMAGES FOR LOSS OF USE, DATA OR PROFITS, ARISING OUT OF OR IN ANY WAY CONNECTED WITH
                                    THE USE OR PERFORMANCE OF THE SITE, WITH THE DELAY OR INABILITY TO USE THE SITE OR
                                    RELATED SERVICES, THE PROVISION OF OR FAILURE TO PROVIDE SERVICES, OR FOR ANY
                                    INFORMATION, SOFTWARE, PRODUCTS, SERVICES AND RELATED GRAPHICS OBTAINED THROUGH THE
                                    SITE, OR OTHERWISE ARISING OUT OF THE USE OF THE SITE, WHETHER BASED ON CONTRACT, TORT,
                                    NEGLIGENCE, STRICT LIABILITY OR OTHERWISE, EVEN IF VALIANT GRADING ADVANTAGE OR ANY OF
                                    ITS SUPPLIERS HAS BEEN ADVISED OF THE POSSIBILITY OF DAMAGES. BECAUSE SOME
                                    STATES/JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF LIABILITY FOR
                                    CONSEQUENTIAL OR INCIDENTAL DAMAGES, THE ABOVE LIMITATION MAY NOT APPLY TO YOU. IF YOU
                                    ARE DISSATISFIED WITH ANY PORTION OF THE SITE, OR WITH ANY OF THESE TERMS OF USE, YOUR
                                    SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE USING THE SITE.

                                </p>
                            </div>

                            <div>
                                <h3>
                                    Termination/Access Restriction
                                </h3>
                                <p>
                                    VGA reserves the right, in its sole discretion, to terminate your access to the Site and
                                    the related services or any portion thereof at any time, without notice. To the maximum
                                    extent permitted by law, this agreement is governed by the laws of the State of Texas
                                    and you hereby consent to the exclusive jurisdiction and venue of courts in Texas in all
                                    disputes arising out of or relating to the use of the Site. Use of the Site is
                                    unauthorized in any jurisdiction that does not give effect to all provisions of these
                                    Terms, including, without limitation, this section.

                                </p>

                                <p>
                                    You agree that no joint venture, partnership, employment, or agency relationship exists
                                    between you and VGA as a result of this agreement or use of the Site. VGA's performance
                                    of this agreement is subject to existing laws and legal process, and nothing contained
                                    in this agreement is in derogation of VGA's right to comply with governmental, court and
                                    law enforcement requests or requirements relating to your use of the Site or information
                                    provided to or gathered by VGA with respect to such use. If any part of this agreement
                                    is determined to be invalid or unenforceable pursuant to applicable law including, but
                                    not limited to, the warranty disclaimers and liability limitations set forth above, then
                                    the invalid or unenforceable provision will be deemed superseded by a valid, enforceable
                                    provision that most closely matches the intent of the original provision and the
                                    remainder of the agreement shall continue in effect.

                                </p>

                                <p>
                                    Unless otherwise specified herein, this agreement constitutes the entire agreement
                                    between the user and VGA with respect to the Site and it supersedes all prior or
                                    contemporaneous communications and proposals, whether electronic, oral or written,
                                    between the user and VGA with respect to the Site. A printed version of this agreement
                                    and of any notice given in electronic form shall be admissible in judicial or
                                    administrative proceedings based upon or relating to this agreement to the same extent
                                    and subject to the same conditions as other business documents and records originally
                                    generated and maintained in printed form. It is the express wish to the parties that
                                    this agreement and all related documents be written in English.
                                </p>
                            </div>

                            <div>
                                <h3>
                                    Insurance
                                </h3>
                                <p>
                                    Insurance will cover the current market value of your card(s) using the average of the
                                    most recently *sold listings of that particular card. This will not go off of declared
                                    value.
                                </p>
                            </div>

                            <div>
                                <h3>
                                    Payment and Refunds
                                </h3>
                                <p>
                                    Once the package has reached our facility, there will be no refunds issued as pre
                                    processing starts once we receive your card(s). Customer is responsible for return
                                    shipping costs as stated on our online submission form. If your card(s) do not receive a
                                    minimum grade you chose during submission, you will still be charged full price as it
                                    had to go through each stage and grading still. This also applies to cards deemed any of
                                    our N- (No Grade) definitions other than N-6.
                                </p>
                            </div>

                            <div>
                                <h3>
                                    Grading and Authentication
                                </h3>
                                <p>
                                    All grades and authentication determinations are final unless a mistake is made by VGA.
                                </p>
                            </div>

                            <div>
                                <h3>
                                    Changes to Terms
                                </h3>
                                <p>
                                    VGA reserves the right, in its sole discretion, to change the Terms under which
                                    <a href=" www.valiantgrading.com" target="_blank"> www.valiantgrading.com</a>
                                    is offered. The most current version of the Terms will supersede
                                    all previous versions. VGA encourages you to periodically review the Terms to stay
                                    informed of our updates.
                                </p>
                            </div>

                            <div>
                                <h3>Contact Us</h3>
                                <p>VGA welcomes your questions or comments regarding the Terms:</p>
                                <p>
                                    Valiant Grading Advantage <br>
                                    9708 S Padre Island Dr Suite B102 <br>
                                    Corpus Christi, Texas 78418
                                </p>
                                <br>

                                <p>Email Address: <br>
                                    <a
                                        href="mailto: help@valiantgrading.com
                                                                                                                                ">help@valiantgrading.com
                                    </a>
                                </p>
                                <br>
                                <p>
                                    Telephone number: <br>
                                    <a href="tel:(361) 414-0052">(361) 414-0052</a>

                                </p>

                                <br>

                                <p>Effective as of August 05, 2021 </p>
                                <br><br>
                            </div>

                        </div>
                        {{-- <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Page Content -->
@endsection
