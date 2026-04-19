
const fs = require('fs');
const pdfParse = require('pdf-parse');
const mammoth = require('mammoth');

async function extract(filePath, mimeType) {
    if (mimeType === 'application/pdf') {
        const dataBuffer = fs.readFileSync(filePath);
        const data = await pdfParse(dataBuffer);
        return data.text;
    } else if (mimeType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
        const result = await mammoth.extractRawText({ path: filePath });
        return result.value;
    } else if (mimeType === 'text/plain') {
        return fs.readFileSync(filePath, 'utf8');
    }
    throw new Error('Unsupported');
}

extract(process.argv[2], process.argv[3]).then(text => console.log(text));
