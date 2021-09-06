<div class="data-items pb-3 ps">
    <div class="data-fields px-2 mt-3">
        <div class="row">

            <style>
                .custom-upload-box{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    padding: 20px;
                    background-color: #F8F8F8;
                    border: 1px dashed #7367F0;
                    border-radius: 5px;
                    font-size: 16px;
                }
                .custom-upload-box i{
                    font-size: 50px;
                }
                .custom-upload-box span{
                    display: block;
                    font-size: 16px;
                    margin-bottom: 5px;
                }
                .uploader-file h6{
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0px;
                    color: #b0b0b0;
                    margin: 20px 0px 10px;
                }
                .uploader-file .media{
                    border-radius: 5px;
                }
                .uploader-file .media:hover{
                    box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.14);
                }
                .uploader-file .media .progress{
                    display: inline-block;
                    width: 85%;
                    margin: 0px;
                }
                .uploader-file .media .btn, .uploader-file .media .done{
                    width: 20px;
                    height: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50%;
                    font-size: 14px;
                    padding: 0px;
                }
                .uploader-file .media .size{
                    font-size: 14px;
                    color: #b0b0b0;
                }
            </style>

            <div class="col-lg-12">
                <div class="custom-upload-box">
                    <i class="feather icon-upload-cloud"></i>
                    <span>Drag &amp; Drop your files here</span>
                    <span>OR</span>
                    <input type="file" id="upload-file" hidden="" >
                    <label for="upload-file" class="btn btn-primary waves-effect waves-light">Browse File</label>
                </div>
                <div class="uploader-file">
                    <h6>Uploaded files</h6>
                    <div class="media-list">
                        <div class="media p-1">
                            <a class="media-left" href="#">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="Generic placeholder image" height="64" width="64">
                            </a>
                            <div class="media-body">
                                <div class="d-flex justify-content-between align-items-center pb-1">
                                    <label>File Name</label>
                                    <span>75%</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar h-100" role="progressbar" aria-valuenow="75" aria-valuemin="75" aria-valuemax="100" style="width:75%" aria-describedby="example-caption-4"></div>
                                    </div>
                                    <button class="btn btn-danger waves-effect waves-light"><i class="fa fa-times mr-0"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="media p-1">
                            <a class="media-left" href="#">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="Generic placeholder image" height="64" width="64">
                            </a>
                            <div class="media-body">
                                <div class="d-flex justify-content-between align-items-center pb-1">
                                    <label>File Name</label>
                                    <span>75%</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="size">971kb</span>
                                    <button class="btn btn-success waves-effect waves-light"><i class="fa fa-check mr-0"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>