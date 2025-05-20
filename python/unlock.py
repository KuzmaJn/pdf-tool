import sys
from pypdf import PdfReader, PdfWriter

if len(sys.argv) != 4:
    print("Usage: unlock.py input.pdf password output.pdf")
    sys.exit(1)

input_pdf = sys.argv[1]
password = sys.argv[2]
output_pdf = sys.argv[3]

try:
    reader = PdfReader(input_pdf)
    if reader.is_encrypted:
        if not reader.decrypt(password):
            print("Error: Unable to decrypt PDF with given password.")
            sys.exit(1)
    writer = PdfWriter()
    for page in reader.pages:
        writer.add_page(page)
    writer.write(output_pdf)
except Exception as e:
    print(f"Error: {e}")
    sys.exit(1)
