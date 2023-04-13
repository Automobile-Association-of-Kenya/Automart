<div class="col-md-2">

                    <div class="col-md-12">
                        <a href="{{ route('dealer.home') }}"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    <br>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <div class="col-md-12">
                                <a href="{{ route('vehicles') }}"><button type="submit" class="btn  btn-block"
                                        style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                            class="fa fa-car"></i> Vehicles</button></a>
                            </div>
                            <br>
                        @else
                            <div class="col-md-12">
                                <a href="{{ route('dealer.mycars') }}"><button type="submit" class="btn  btn-block"
                                        style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                            class="fa fa-car"></i> My Cars</button></a>
                            </div>
                            <br>
                        @endif
                    @endauth



                    <div class="col-md-12">
                        <a href="{{ route('dealer.subscriptions') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.mysales') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sale</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.addcar') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    <br>

                    @auth
                        @if (auth()->user()->role === 'admin')
                            <div class="col-md-12">
                                <a href="#"><button type="submit" class="btn  btn-block"
                                        style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                            class="fa fa-plus"></i> Users</button></a>
                            </div>
                            <br>
                        @endif
                    @endauth

                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    <br>
                </div>
