<script setup lang="ts">
const props = defineProps(['parentID', 'uploadURL', 'deleteURL']);

const files = defineModel();

const getPreview = (file: object) => {
    switch (file.extension) {
        case 'png':
        case 'jpg':
        case 'jpeg':
            return file.url;
        case 'pdf':
            return '/storage/images/mimetype/pdf.svg';
        case 'doc':
        case 'docx':
            return '/storage/images/mimetype/doc.svg';
        case 'xls':
        case 'xlsx':
            return '/storage/images/mimetype/xls.svg';
        case 'txt':
            return '/storage/images/mimetype/txt.svg';
        default:
            return '/storage/images/mimetype/none.svg';
    }
};

const loadFiles = (event: { files: any[] }) => {
    let formData = new FormData();
    formData.append('file', event.files[0]);
    if (props.parentID) {
        formData.append('id', props.parentID);
    }
    axios.post(props.uploadURL, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then((response: any) => {
            if (!response.data.success) {
                return;
            }
            files.value.push(response.data.file);
        });
};

const removeFiles = (file: object, index: number) => {
    axios.post(props.deleteURL, file)
        .then((response: any) => {
            if (!response.data.success) {
                return;
            }
            files.value.splice(index, 1);
        });
};
</script>

<template>
    <div class="FileUpload">
        <FileUpload @select="loadFiles" :multiple="false" customUpload auto>
            <template #header="{ chooseCallback, uploadCallback, clearCallback }">
                <input
                    type="button"
                    ref="chooseFile"
                    style="display: none"
                    @click="
                        chooseCallback();
                        clearCallback();
                    "
                />
                <div v-if="files.length > 0" class="listFiles">
                    <div v-for="(file, index) of files" class="item">
                        <Button @click="removeFiles(file, index)" class="remove">
                            <template #icon>
                                <span class="p-button-icon material-symbols-outlined">close</span>
                            </template>
                        </Button>
                        <img role="presentation" :alt="file.name" :title="file.name" :src="getPreview(file)" />
                    </div>
                </div>
            </template>
            <template #content>
                <div class="loadBlock">
                    <i class="p-button-icon material-symbols-outlined">attach_file</i>
                    <div>
                        <span>Перетащите файл или нажмите</span>
                        <Button @click="$refs.chooseFile.click()" class="textStyle blackText" label="загрузить"></Button>
                    </div>
                </div>
            </template>
            <template #empty></template>
        </FileUpload>
    </div>
</template>

<style lang="scss">
.FileUpload {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;

    .listFiles {
        display: flex;
        justify-content: left;
        flex-wrap: wrap;
        width: fit-content;
        min-width: fit-content;
        gap: 10px;

        .item {
            position: relative;
            width: 90px;
            height: 90px;
            border-radius: 10px;

            .remove {
                position: absolute;
                top: 10px;
                right: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0;
                border-radius: 15px;
                width: 30px;
                height: 30px;
                padding: 4px;
                background: rgba(0, 0, 0, 0.3);

                span {
                    font-size: 15px;
                    color: rgba(255, 255, 255, 1);
                }

                &.p-button-icon-only::after {
                    content: '';
                }
            }

            img {
                width: 90px;
                height: 90px;
                border-radius: 10px;
            }
        }
    }

    .p-fileupload {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
        background: none;
        border: none;

        .p-fileupload-header {
            input {
                display: none;
            }
        }

        .p-fileupload-content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            gap: 10px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 1);
            border: 2px dashed rgba(224, 224, 224, 1);

            & > div {
                display: none;
            }

            .loadBlock {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);

                div {
                    display: flex;
                    align-items: center;
                    gap: 5px;
                }
            }
        }
    }
}
</style>
